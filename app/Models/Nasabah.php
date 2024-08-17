<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Nasabah extends Model
{
    use HasFactory, HasApiTokens;

//    protected $table = 'dbo.m_GPRMD_Check_20240331';
    protected $table = 'nasabah';

    protected $guarded = ['id'];
    /*protected $fillable = [
        'NasabahId',
        'LoanId',
        'Siklus',
        'TanggalPencairan',
        'TanggalPencairanValue',
        'NamaFile',
        'StartingDateGP',
        'EndDateGP',
        'StatusEksekusiTIF',
        'DateEksekusiTIF',
        'StartingDateGP_Penyesuaian',
        'EndDateGP_Penyesuaian',
        'Status',
    ];*/

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Documents::class);
    }
}
