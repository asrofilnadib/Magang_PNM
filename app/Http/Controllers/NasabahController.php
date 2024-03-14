<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

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
//        dd($this->nasabah);
        return view('home', [
            'status' => $this->nasabah,
            'sumNasabah' => Nasabah::count()
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
}
