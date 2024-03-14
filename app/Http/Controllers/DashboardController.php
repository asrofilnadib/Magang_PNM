<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MGPRMDCheck;
use App\Models\MGP;
class DashboardController extends Controller
{
    public function index()
    {
        // Banyaknya NOA (Number of Accounts) berdasarkan jumlah LoanID
        $numberOfAccounts = MGPRMDCheck::distinct('LoanId')->count();

        // Dropdown berdasarkan NamaFile
        $namaFiles = MGP::pluck('NamaFile', 'NamaFile');

        // Banyaknya status sesuai/modifikasi di kolom StatusEksekusiTIF
        $statusCounts = MGPRMDCheck::select('StatusEksekusiTIF', \DB::raw('count(*) as total'))
            ->groupBy('StatusEksekusiTIF')
            ->pluck('total', 'StatusEksekusiTIF');

        // Detail jumlah NOA berdasarkan Starting Date GP dan End Date GP beserta Status dan Status Eksekusi TIF
        $noaDetails = MGPRMDCheck::select('NasabahId', 'StartingDateGP', 'EndDateGP', 'Status', 'StatusEksekusiTIF')
            ->get();

        return view('dashboard.index')->with('numberOfAccounts', $numberOfAccounts);

    }
}