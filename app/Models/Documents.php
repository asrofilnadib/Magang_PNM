<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'documents';

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function nasabah()
    {
      return $this->hasMany(Nasabah::class);
    }
}
