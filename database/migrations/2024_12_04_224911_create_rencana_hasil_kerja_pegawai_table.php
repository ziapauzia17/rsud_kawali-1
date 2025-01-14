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
        Schema::create('rencana_hasil_kerja_pegawai', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('rencana_atasan_id')->constrained('rencana_hasil_kerja')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('skp_id')->constrained('skps')->onDelete('cascade');
            $table->string('rencana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_hasil_kerja_pegawai');
    }
};