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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->integer('no_antrean');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('varian_motor');
            $table->string('jenis_service');
            $table->date('tanggal_registrasi');
            $table->string('jam_kedatangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
