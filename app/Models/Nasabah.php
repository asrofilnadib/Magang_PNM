<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Documents::class, 'namaFile_id');
    }
}
