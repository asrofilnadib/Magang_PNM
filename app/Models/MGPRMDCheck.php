<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MGPRMDCheck extends Model
{
    protected $table = 'm_GPRMD_Check';

    public function mGP()
    {
        return $this->belongsTo(MGP::class, 'NamaFile', 'NamaFile');
    }
}

