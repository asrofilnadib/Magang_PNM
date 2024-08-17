<?php

namespace App\Filters\V1;

use App\Filters\ApiFilters;
use Illuminate\Http\Request;

class NasabahFilters extends ApiFilters
{
    protected $safeParams = [
        'nasabahId' => ['eq'],
        'loandId' => ['eq'],
        'siklus' => ['eq', 'lt', 'gt'],
        'tanggalPencairan' => ['eq', 'lt', 'gt'],
        'tanggalPencairanValue' => ['eq', 'lt', 'gt'],
        'namaFile' => ['eq'],
        'startingDateGP' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'endDateGP' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'statusEksekusiTIF' => ['eq'],
        'dateEksekusiTIF' => ['eq'],
        'startingDateGP_Penyesuaian' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'endDateGP_Penyesuaian' => ['eq', 'lt', 'lte', 'gt', 'gte'],
        'status' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'startingDateGP' => 'startingDateGP',
        'endDateGP' => 'endDateGP',
        'status' => 'status',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
