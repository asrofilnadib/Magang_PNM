<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Nasabah;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function Laravel\Prompts\select;
use Illuminate\Database\QueryException;

class NasabahController extends Controller
{
  public function index(Request $request)
  {
    $namaFile = $request->input('nama_file');

    $from = $request->input('from') ?? Nasabah::min('startingDateGP');
    $to = $request->input('to') ?? Nasabah::max('endDateGP');

    if ($namaFile) {
      /*$nasabah = Nasabah::where('namaFile_id', $namaFile)
      ->where(function ($query) use ($from, $to) {
      $query->where('startingDateGP', '>=', $from)
      ->where('endDateGP', '<=', $to);
      })->get();*/

      if ($namaFile == 'semua_file') {
        $nasabah = Nasabah::query();

        if ($from) {
          $nasabah->where('startingDateGP', '>=', $from);
        }
        if ($to) {
          $nasabah->where('endDateGP', '<=', $to);
        }
        $nasabah = $nasabah->get();

      } else {
        $nasabah = Nasabah::query();
        $nasabah->where('namaFile_id', $namaFile);
        if ($from) {
          $nasabah->where('startingDateGP', '>=', $from);
        }
        if ($to) {
          $nasabah->where('endDateGP', '<=', $to);
        }
        $nasabah = $nasabah->get();
      }
    } else {
      $nasabah = Nasabah::all();
    }


//    dd($nasabah);

    $sesuai = $nasabah->where('StatusEksekusiTIF', 'Sesuai')->count();
    $modifikasi = $nasabah->where('StatusEksekusiTIF', 'Modifikasi')->count();

    $tidakAdaJadwal = $nasabah->where('Status', 'Tidak Ada Jadwal')->count();
    $masihAdaJadwal = $nasabah->where('Status', 'Masih Ada Jadwal')->count();
    $pembiayaanLunas = $nasabah->where('Status', 'Pembiayaan Lunas')->count();

    $statusTIFPembiayaan = [
      [
        'Tidak' => [
          'sesuai' => $nasabah->where('StatusEksekusiTIF', 'Sesuai')->where('Status', 'Tidak Ada Jadwal')->count(),
          'modifikasi' => $nasabah->where('StatusEksekusiTIF', 'Modifikasi')->where('Status', 'Tidak Ada Jadwal')->count(),
        ],
        'Masih' => [
          'sesuai' => $nasabah->where('StatusEksekusiTIF', 'Sesuai')->where('Status', 'Masih Ada Jadwal')->count(),
          'modifikasi' => $nasabah->where('StatusEksekusiTIF', 'Modifikasi')->where('Status', 'Masih Ada Jadwal')->count(),
        ],
        'Pembiayaan' => [
          'sesuai' => $nasabah->where('StatusEksekusiTIF', 'Sesuai')->where('Status', 'Pembiayaan Lunas')->count(),
          'modifikasi' => $nasabah->where('StatusEksekusiTIF', 'Modifikasi')->where('Status', 'Pembiayaan Lunas')->count(),
        ]
      ]
    ];

    if ($nasabah->isEmpty()) {
      Alert::warning('', 'Data tidak ditemukan');
    }

//    dd($statusTIFPembiayaan);

    return view('home', [
      'statusTIF' => json_encode([
        'label' => ['Sesuai', 'Modifikasi'],
        'data' => [$sesuai, $modifikasi]
      ]),
      'statusPembiayaan' => json_encode([
        'label' => ['Tidak Ada Jadwal', 'Masih Ada Jadwal', 'Pembiayaan Lunas'],
        'data' => [$tidakAdaJadwal, $masihAdaJadwal, $pembiayaanLunas]
      ]),
      'nasabah' => $nasabah,
      'sumNasabah' => $nasabah->count(),
      'statusTIFPembiayaan' => json_encode($statusTIFPembiayaan),
      'namaFiles' => Nasabah::select('namaFile_id')->distinct()->get(),
    ]);

    /*$nasabah = Nasabah::whereIn('StatusEksekusiTIF', ['Sesuai', 'Modifikasi'])
      ->latest()
      ->limit(20)
      ->get();*/
  }

  public function show($idNasabah)
  {
    $nasabah = Nasabah::where('NasabahId', $idNasabah)->first();

    return view('nasabah.show', [
      'nasabah' => $nasabah
    ]);
  }

  public function tableNasabah()
  {
    return view('tables', [
      'nasabah' => Nasabah::all(),
      'dokumen' => Documents::all(),
    ]);
  }

  private function isStartingDateGPExist($startingDate)
  {
    return Nasabah::where('startingDateGP', '<=', $startingDate)->exists();
  }
}
