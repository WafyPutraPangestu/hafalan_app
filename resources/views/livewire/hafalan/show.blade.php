<?php

namespace App\Livewire\Hafalan;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Progress Hafalan — HafizApp')]
class Show extends Component
{
    public Siswa $siswa;

    public function mount($kode_akses)
    {
        // Cari siswa beserta data setoran dan ustadznya
        $this->siswa = Siswa::where('kode_akses', $kode_akses)
            ->with(['setorans.ustadz'])
            ->firstOrFail();
    }

    public function render()
    {
        $setorans = $this->siswa->setorans->sortByDesc('tanggal')->sortByDesc('jam');

        // 1. Hitung Progress Mushaf (Asumsi 604 Halaman Al-Qur'an)
        // Kita hanya menghitung setoran "Ziyadah" (Hafalan Baru)
        $totalHalamanZiyadah = $setorans->where('jenis', 'ziyadah')->sum('jumlah_halaman');
        $persentaseQuran = min(($totalHalamanZiyadah / 604) * 100, 100);

        // 2. Data Grafik Kualitas (Distribusi Nilai)
        $nilaiA = $setorans->where('nilai', 'A')->count();
        $nilaiB = $setorans->where('nilai', 'B')->count();
        $nilaiC = $setorans->where('nilai', 'C')->count();
        $nilaiD = $setorans->where('nilai', 'D')->count();
        $grafikNilai = collect([$nilaiA, $nilaiB, $nilaiC, $nilaiD])->toJson();

        // 3. Statistik Cepat
        $totalMurojaah = $setorans->where('jenis', 'murojaah')->count();
        $setoranTerakhir = $setorans->first();

        return view('livewire.hafalan.show', compact('setorans', 'totalHalamanZiyadah', 'persentaseQuran', 'grafikNilai', 'totalMurojaah', 'setoranTerakhir'));
    }
}
