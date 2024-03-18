<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class NasabahController extends Controller
{
  public $nasabah;

  public function index()
  {
    $nasabah = Nasabah::whereIn('StatusEksekusiTIF', ['Sesuai', 'Modifikasi'])
      ->latest()
      ->limit(20)
      ->get();

    $this->nasabah = $this->formatData($nasabah);
    $status = $this->polarAreaChart($nasabah);
    $filter = $this->filterData(request());
//        dd($this->nasabah);
    return view('home', [
      'status' => $this->nasabah,
      'sumNasabah' => Nasabah::count(),
      'nasabah' => Nasabah::all(),
      'statusPembiayaan' => $status,
      'filters' => $filter,
    ]);
  }

  public function tableNasabah()
  {
    return view('tables', [
      'nasabah' => Nasabah::all(),
      'dokumen' => Documents::all()
    ]);
  }

  public function formatData($nasabah)
  {
    $sesuai = 0;
    $modifikasi = 0;

    foreach ($nasabah as $klien) {
      if ($klien->StatusEksekusiTIF == 'Sesuai') {
        $sesuai++;
      } elseif ($klien->StatusEksekusiTIF == 'Modifikasi') {
        $modifikasi++;
      }
    }

    $data = [
      'label' => ['Sesuai', 'Modifikasi'],
      'data' => [$sesuai, $modifikasi],
    ];

    return json_encode($data);
  }

  public function show($idNasabah)
  {
    $nasabah = Nasabah::where('NasabahId', $idNasabah)->first();

    return view('nasabah.show', [
      'nasabah' => $nasabah
    ]);
  }

  public function polarAreaChart($nasabah)
  {
    $tidakAdaJadwal = 0;
    $masihAdaJadwal = 0;
    $pembiayaanLunas = 0;

    foreach ($nasabah as $klien) {
      if ($klien->Status == 'Tidak Ada Jadwal') {
        $tidakAdaJadwal++;
      } elseif ($klien->Status == 'Masih Ada Jadwal') {
        $masihAdaJadwal++;
      } elseif ($klien->Status == 'Pembiayaan Lunas') {
        $pembiayaanLunas++;
      }
    }

    $data = [
      'label' => ['Tidak Ada Jadwal', 'Masih Ada Jadwal', 'Pembiayaan Lunas'],
      'data' => [$tidakAdaJadwal, $masihAdaJadwal, $pembiayaanLunas],
    ];

    return json_encode($data);
  }

  public function filterData(Request $request)
  {
    // Mendapatkan nilai filter dari request
    $filter = $request->input('filter');
    $from = $request->input('from');
    $to = $request->input('to');

    // Query data berdasarkan filter
    $query = Documents::query();

    // Jika filter nama file tidak kosong, tambahkan kondisi pencarian berdasarkan nama file
    if (!empty($filter)) {
      $query->where('NamaFile', $filter);
    }

    // Jika tanggal dari tidak kosong, tambahkan kondisi pencarian berdasarkan starting date
    if (!empty($from)) {
      $query->where('StartingDateGP', '>=', $from);
    }

    // Jika tanggal sampai tidak kosong, tambahkan kondisi pencarian berdasarkan end date
    if (!empty($to)) {
      $query->where('EndDateGP', '<=', $to);
    }

    // Eksekusi query dan ambil data yang sesuai dengan filter
    $filteredData = $query->get();

    // Kemudian lakukan apa yang diperlukan dengan data yang telah difilter
    // Misalnya, kirim data ke view atau lakukan manipulasi data lainnya

    // Contoh: kirim data ke view
    return json_encode($filteredData);
  }
}
