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
        Schema::create('kemasan', function (Blueprint $table) {
            $table->id('kemasan_id');
            $table->string('rak');
            $table->integer('baris');
            $table->integer('kolom');
            $table->string('label')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kemasans');
    }
};
