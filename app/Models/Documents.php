<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'dbo.m_GP';

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function nasabah()
    {
      return $this->hasMany(Nasabah::class);
    }
}
