<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('Id')->nullable()->unique();
            $table->string('NamaFile', 255);
            $table->date('TanggalTerima')->nullable();
            $table->string('DivisiAsal', 100)->nullable();
            $table->string('NoMemoAsal', 100)->nullable();
            $table->string('PerihalMemoAsal', 255)->nullable();
            $table->date('TanggalKirim')->nullable();
            $table->string('NoMemoOBS', 100)->nullable();
            $table->string('PerihalMemoOBS', 255)->nullable();
            $table->string('NoTiket', 255)->nullable();
            $table->string('StatusTiket', 255)->nullable();
            $table->string('JenisGP', 255)->nullable();
            $table->timestamps();
        });

        /*Schema::table('documents', function (Blueprint $table) {
          $table->primary('Id');
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
