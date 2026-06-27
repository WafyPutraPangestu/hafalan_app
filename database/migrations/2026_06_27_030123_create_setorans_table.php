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
        Schema::create('setorans', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel siswas
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');

            // Relasi ke tabel users (sebagai Ustadz yang menerima setoran)
            $table->foreignId('ustadz_id')->constrained('users')->onDelete('cascade');

            $table->date('tanggal');
            $table->time('jam');
            $table->enum('jenis', ['ziyadah', 'murojaah']);
            $table->string('surah_awal');
            $table->integer('ayat_awal');
            $table->string('surah_akhir');
            $table->integer('ayat_akhir');
            $table->decimal('jumlah_halaman', 5, 2)->comment('Bisa desimal misal 1.5 halaman');
            $table->string('nilai')->comment('A/B/C atau angka');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setorans');
    }
};
