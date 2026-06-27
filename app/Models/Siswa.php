<?php

namespace App\Models;

use Database\Factories\SiswaFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'nama',
    'nis',
    'kelas',
    'kode_akses',
    'tanggal_masuk',
    'status'
])]
class Siswa extends Model
{
    /** @use HasFactory<SiswaFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'date',
        ];
    }

    /**
     * Relasi ke tabel setorans
     */
    public function setorans(): HasMany
    {
        return $this->hasMany(Setoran::class);
    }
}
