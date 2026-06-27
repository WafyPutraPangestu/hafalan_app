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

    public function mount(string $kode_akses): void
    {
        $this->siswa = Siswa::where('kode_akses', $kode_akses)
            ->with(['setorans.ustadz'])
            ->firstOrFail();
    }

    public function render()
    {
        // Sort sekali pakai sortBy chained (lebih efisien)
        $setorans = $this->siswa->setorans
            ->sortByDesc('tanggal')
            ->sortByDesc('jam')
            ->values();

        // Progress Mushaf — hanya Ziyadah
        $totalHalamanZiyadah = $setorans->where('jenis', 'ziyadah')->sum('jumlah_halaman');
        $persentaseQuran     = round(min(($totalHalamanZiyadah / 604) * 100, 100), 1);

        // Statistik cepat
        $totalSetoran    = $setorans->count();
        $totalZiyadah    = $setorans->where('jenis', 'ziyadah')->count();
        $totalMurojaah   = $setorans->where('jenis', 'murojaah')->count();
        $setoranTerakhir = $setorans->first();

        // Distribusi nilai — kirim sebagai array biasa, bukan JSON
        // (biarkan Blade yang format, bukan JS)
        $distribusiNilai = [
            'A' => $setorans->where('nilai', 'A')->count(),
            'B' => $setorans->where('nilai', 'B')->count(),
            'C' => $setorans->where('nilai', 'C')->count(),
            'D' => $setorans->where('nilai', 'D')->count(),
        ];

        // Nilai terbanyak
        $nilaiTerbanyak = collect($distribusiNilai)->sortDesc()->keys()->first() ?? '—';

        return view('livewire.hafalan.show', compact(
            'setorans',
            'totalHalamanZiyadah',
            'totalSetoran',
            'totalZiyadah',
            'totalMurojaah',
            'persentaseQuran',
            'distribusiNilai',
            'nilaiTerbanyak',
            'setoranTerakhir',
        ));
    }
}
