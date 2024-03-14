<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMGPRMDCheckTable extends Migration
{
    public function up()
    {
        Schema::create('m_GPRMD_Check', function (Blueprint $table) {
            $table->id();
            $table->string('NasabahId', 255);
            $table->string('LoanId', 255);
            $table->string('Siklus', 255);
            $table->date('TanggalPencairan');
            $table->date('TanggalPencairanValue');
            $table->string('NamaFile', 255);
            $table->date('StartingDateGP');
            $table->date('EndDateGP');
            $table->string('StatusEksekusiTIF', 250);
            $table->dateTime('DateEksekusiTIF');
            $table->date('StartingDateGP_Penyesuaian');
            $table->date('EndDateGP_Penyesuaian');
            $table->string('Status', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_GPRMD_Check');
    }
}
