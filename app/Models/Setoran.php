<?php

namespace App\Models;

use Database\Factories\SetoranFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'siswa_id',
    'ustadz_id',
    'tanggal',
    'jam',
    'jenis',
    'surah_awal',
    'ayat_awal',
    'surah_akhir',
    'ayat_akhir',
    'jumlah_halaman',
    'nilai',
    'catatan'
])]
class Setoran extends Model
{
    /** @use HasFactory<SetoranFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tanggal'        => 'date',
            'ayat_awal'      => 'integer',
            'ayat_akhir'     => 'integer',
            'jumlah_halaman' => 'decimal:2',
        ];
    }

    /**
     * Relasi ke tabel siswas
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Relasi ke tabel users (Ustadz)
     */
    public function ustadz(): BelongsTo
    {
        // Parameter kedua diisi 'ustadz_id' karena nama method berbeda dengan nama kolom asli
        return $this->belongsTo(User::class, 'ustadz_id');
    }
}
