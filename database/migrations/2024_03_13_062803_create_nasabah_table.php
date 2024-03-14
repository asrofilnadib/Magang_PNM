<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('NasabahId', 255);
            $table->string('LoanId', 255);
            $table->string('Siklus', 255);
            $table->date('TanggalPencairan')->nullable();
            $table->date('TanggalPencairanValue')->nullable();
            $table->string('NamaFile', 255);
            $table->date('StartingDateGP')->nullable();
            $table->date('EndDateGP')->nullable();
            $table->string('StatusEksekusiTIF', 250);
            $table->datetime('DateEksekusiTIF')->nullable();
            $table->date('StartingDateGP_Penyesuaian')->nullable();
            $table->date('EndDateGP_Penyesuaian')->nullable();
            $table->string('Status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};
