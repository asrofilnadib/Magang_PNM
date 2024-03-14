<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MGP extends Model
{
    protected $table = 'm_GP';

    public function mGPRMDChecks()
    {
        return $this->hasMany(MGPRMDCheck::class, 'NamaFile', 'NamaFile');
    }
}
