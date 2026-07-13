<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->string('kelas');
            $table->string('kode_akses')->unique()->comment('Unik, untuk wali murid');
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'alumni'])->default('aktif');
            $table->timestamps();
        });
        DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');
        DB::statement('CREATE INDEX siswas_nama_trgm_idx ON siswas USING GIN (nama gin_trgm_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
