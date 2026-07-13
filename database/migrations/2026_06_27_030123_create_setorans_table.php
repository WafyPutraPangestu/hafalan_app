<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setorans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('ustadz_id')->constrained('users')->onDelete('cascade');

            $table->date('tanggal');
            $table->time('jam');

            // ziyadah = nambah hafalan baru, murojaah = mengulang, tadarus = baca biasa
            $table->enum('jenis', ['ziyadah', 'murojaah', 'tadarus']);

            // menentukan field mana di bawah ini yang wajib dipakai
            $table->enum('tingkatan', ['iqro', 'juz_ama', 'quran']);

            // ===== Khusus tingkatan: IQRO =====
            $table->unsignedTinyInteger('iqro_awal')->nullable()->comment('Nomor Iqro awal, misal 1-6');
            $table->unsignedInteger('halaman_iqro_awal')->nullable();
            $table->unsignedInteger('ayat_iqro_awal')->nullable();

            $table->unsignedTinyInteger('iqro_akhir')->nullable();
            $table->unsignedInteger('halaman_iqro_akhir')->nullable();
            $table->unsignedInteger('ayat_iqro_akhir')->nullable();

            // ===== Khusus tingkatan: JUZ AMA (bisa 1 surat atau lebih) =====
            $table->string('surah_awal')->nullable();
            $table->integer('ayat_awal')->nullable();
            $table->string('surah_akhir')->nullable();
            $table->integer('ayat_akhir')->nullable();

            // ===== Khusus tingkatan: QURAN (hanya juz & halaman) =====
            $table->string('juz')->nullable()->comment('Misal: Juz 1, Juz 2, dst.');
            $table->unsignedInteger('halaman_awal')->nullable();
            $table->unsignedInteger('halaman_akhir')->nullable();

            $table->decimal('jumlah_halaman', 5, 2)->comment('Bisa desimal misal 1.5 halaman');
            $table->string('nilai')->comment('A/B/C atau angka');
            $table->text('catatan')->nullable();
            $table->timestamps();

            // ===== INDEX tambahan untuk performa query =====
            $table->index(['jenis', 'tingkatan']);
            $table->index(['tanggal', 'jam']);
            // siswa_id & ustadz_id TIDAK perlu ditambah manual,
            // karena foreignId()->constrained() otomatis bikin index sendiri
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setorans');
    }
};
