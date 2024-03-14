<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMGPTable extends Migration
{
    public function up()
    {
        Schema::create('m_GP', function (Blueprint $table) {
            $table->id();
            $table->string('NamaFile', 255);
            $table->date('TanggalTerima');
            $table->string('DivisiAsal', 100);
            $table->string('NoMemoAsal', 100);
            $table->string('PerihalMemoAsal', 255);
            $table->date('TanggalKirim');
            $table->string('NoMemoOBS', 100);
            $table->string('PerihalMemoOBS', 255);
            $table->string('NoTiket', 255);
            $table->integer('Id')->unsigned()->primary();
            $table->string('StatusTiket', 255);
            $table->string('JenisGP', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_GP');
    }
};
