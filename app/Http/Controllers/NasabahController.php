<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Nasabah;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\Document;
use RealRashid\SweetAlert\Facades\Alert;
use function Laravel\Prompts\select;
use Illuminate\Database\QueryException;

class NasabahController extends Controller
{
  public $timestamps = false;

  public function index(Request $request)
  {
    $namaFile = $request->input('nama_file');

    $from = $request->input('from') ?? Nasabah::min('StartingDateGP');
    $to = $request->input('to') ?? Nasabah::max('EndDateGP');

    if ($namaFile) {
      /*$nasabah = Nasabah::where('namaFile_id', $namaFile)
      ->where(function ($query) use ($from, $to) {
      $query->where('startingDateGP', '>=', $from)
      ->where('endDateGP', '<=', $to);
      })->get();*/

      if ($namaFile == 'semua_file') {
        $nasabah = Nasabah::query();
        if ($from) {
          $nasabah->where('StartingDateGP', '>=', $from);
        }
        if ($to) {
          $nasabah->where('EndDateGP', '<=', $to);
        }
        $nasabah = $nasabah->whereNotNull('StatusEksekusiTIF')->get();
      } else {
        $nasabah = Nasabah::query();
        $nasabah->where('NamaFile', $namaFile);
        if ($from) {
          $nasabah->where('StartingDateGP', '>=', $from);
        }
        if ($to) {
          $nasabah->where('EndDateGP', '<=', $to);
        }
        $nasabah = $nasabah->whereNotNull('StatusEksekusiTIF')->get();
      }
    } else {
      $nasabah = Nasabah::whereNotNull('StatusEksekusiTIF')->get();
    }

    /* Kolom Status Eksekusi TIF */
    $sesuai = $nasabah->where('StatusEksekusiTIF', 'Sesuai')->select('StatusEksekusiTIF')->count();
    $modifikasi = $nasabah->where('StatusEksekusiTIF', 'Modifikasi')->select('StatusEksekusiTIF')->count();
    $layak = $nasabah->where('StatusEksekusiTIF', 'LAYAK')->select('StatusEksekusiTIF')->count();
    $layakTanpaPenyesuaian = $nasabah->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')->select('StatusEksekusiTIF')->count();
    $layakTanpaAdaPenyesuaian = $nasabah->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')->select('StatusEksekusiTIF')->count();
    $layakDenganPenyesuaian = $nasabah->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')->select('StatusEksekusiTIF')->count();

    /* Kolom Status Pembiayaan */
    $tidakAdaJadwal = $nasabah->where('Status', 'Tidak Ada Jadwal')->select('Status')->count();
    $masihAdaJadwal = $nasabah->where('Status', 'Masih Ada Jadwal')->select('Status')->count();
    $pembiayaanLunas = $nasabah->where('Status', 'Pembiayaan Lunas')->select('Status')->count();

    /* Status TIF Pembiayaan
        S = Sesuai
        M = Modifikasi
        L = Layak
        LTP = Layak Tanpa Penyesuaian
        LTAP = Layak Tanpa Ada Penyesuaian
        LDP = Layak Dengan Penyesuaian
    */
    $tidakS = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'Sesuai')
      ->select('Status')
      ->count();
    $tidakM = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'Modifikasi')
      ->select('Status')
      ->count();
    $tidakL = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK')
      ->select('Status')
      ->count();
    $tidakLTP = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA PENYESUAIAN')
      ->select('Status')
      ->count();
    $tidakLTAP = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')
      ->select('Status')
      ->count();
    $tidakLDP = $nasabah->where('Status', 'Tidak Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK DENGAN PENYESUAIAN')
      ->select('Status')
      ->count();

    $masihS = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'Sesuai')
      ->select('Status')
      ->count();
    $masihM = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'Modifikasi')
      ->select('Status')
      ->count();
    $masihL = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK')
      ->select('Status')
      ->count();
    $masihLTP = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA PENYESUAIAN')
      ->select('Status')
      ->count();
    $masihLTAP = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')
      ->select('Status')
      ->count();
    $masihLDP = $nasabah->where('Status', 'Masih Ada Jadwal')
      ->where('StatusEksekusiTIF', 'LAYAK DENGAN PENYESUAIAN')
      ->select('Status')
      ->count();

    $pembiayaanS = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'Sesuai')
      ->select('Status')
      ->count();
    $pembiayaanM = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'Modifikasi')
      ->select('Status')
      ->count();
    $pembiayaanL = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'LAYAK')
      ->select('Status')
      ->count();
    $pembiayaanLTP = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA PENYESUAIAN')
      ->select('Status')
      ->count();
    $pembiayaanLTAP = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'LAYAK TANPA ADA PENYESUAIAN')
      ->select('Status')
      ->count();
    $pembiayaanLDP = $nasabah->where('Status', 'Pembiayaan Lunas')
      ->where('StatusEksekusiTIF', 'LAYAK DENGAN PENYESUAIAN')
      ->select('Status')
      ->count();

    $statusTIFPembiayaan = [
      [
        'Tidak' => [
          'sesuai' => $tidakS,
          'modifikasi' => $tidakM,
          'layak' => $tidakL,
          'layakTanpaPenyesuaian' => $tidakLTP,
          'layakTanpaAdaPenyesuaian' => $tidakLTAP,
          'layakDenganPenyesuaian' => $tidakLDP,
        ],
        'Masih' => [
          'sesuai' => $masihS,
          'modifikasi' => $masihM,
          'layak' => $masihL,
          'layakTanpaPenyesuaian' => $masihLTP,
          'layakTanpaAdaPenyesuaian' => $masihLTAP,
          'layakDenganPenyesuaian' => $masihLDP,
        ],
        'Pembiayaan' => [
          'sesuai' => $pembiayaanS,
          'modifikasi' => $pembiayaanM,
          'layak' => $pembiayaanL,
          'layakTanpaPenyesuaian' => $pembiayaanLTP,
          'layakTanpaAdaPenyesuaian' => $pembiayaanLTAP,
          'layakDenganPenyesuaian' => $pembiayaanLDP,
        ]
      ]
    ];

    if ($nasabah->isEmpty()) {
      Alert::warning('', 'Data tidak ditemukan');
    }

//    dd($statusTIFPembiayaan);

    return view('home', [
      'statusTIF' => json_encode([
        'label' => ['Sesuai', 'Modifikasi', 'Layak', 'Layak Tanpa Ada Penyesuaian', 'Layak Tanpa Penyesuaian', 'Layak Dengan Penyesuaian'],
        'data' => [$sesuai, $modifikasi, $layak, $layakTanpaAdaPenyesuaian, $layakTanpaPenyesuaian, $layakDenganPenyesuaian]
      ]),
      'statusPembiayaan' => json_encode([
        'label' => ['Tidak Ada Jadwal', 'Masih Ada Jadwal', 'Pembiayaan Lunas'],
        'data' => [$tidakAdaJadwal, $masihAdaJadwal, $pembiayaanLunas]
      ]),
      'nasabah' => $nasabah,
      'sumNasabah' => $nasabah->count(),
      'statusTIFPembiayaan' => json_encode($statusTIFPembiayaan),
      /*'namaFiles' => Documents::select('a.NamaFile', 'b.Id')
        ->from('m_GPRMD_Check_20240331 as a')
        ->join('m_GP as b', 'a.NamaFile', '=', 'b.NamaFile')
        ->where('Id', '>=', 216)
        ->distinct()
        ->get()*/
      'namaFiles' => Nasabah::select('NamaFile')
        ->whereNotNull('StatusEksekusiTIF')
        ->distinct()
        ->get()
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

  private function executionTime($nasabah)
  {
    $start = microtime(true);
    $count = $nasabah;
    $end = microtime(true);

    echo "Waktu Eksekusi: " . ($end - $start) . " detik";
  }
}
