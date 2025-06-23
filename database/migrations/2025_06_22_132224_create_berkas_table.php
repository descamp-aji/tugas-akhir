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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id('berkas_id');
            $table->string('wajib_pajak_id');
            $table->string('kode_riksa_id');
            $table->integer('berkas_status_id');
            $table->integer('kemasan_id');
            $table->string('no_lhp');
            $table->date('tgl_lhp');
            $table->string('masa_pajak_awal');
            $table->string('masa_pajak_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
