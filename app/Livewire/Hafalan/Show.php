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

    /** Filter tab riwayat: '' = semua, atau 'iqro' | 'juz_ama' | 'quran' */
    public string $filterTingkatan = '';

    public function mount(string $kode_akses): void
    {
        $this->siswa = Siswa::query()
            ->where('kode_akses', $kode_akses)
            ->with([
                'setorans' => fn($q) => $q->orderByDesc('tanggal')->orderByDesc('jam'),
                'setorans.ustadz:id,name',
            ])
            ->firstOrFail();
    }

    public function setFilter(string $tingkatan): void
    {
        $this->filterTingkatan = $this->filterTingkatan === $tingkatan ? '' : $tingkatan;
    }

    public function render()
    {
        $semuaSetoran = $this->siswa->setorans;

        // Level yang sedang dijalani santri = tingkatan pada setoran ziyadah paling baru.
        // Fallback ke setoran apapun terbaru kalau belum pernah ziyadah sama sekali.
        $setoranZiyadahTerakhir = $semuaSetoran->firstWhere('jenis', 'ziyadah');
        $tingkatanAktif = $setoranZiyadahTerakhir?->tingkatan ?? $semuaSetoran->first()?->tingkatan;
        $iqroAktif = $tingkatanAktif === 'iqro' ? $setoranZiyadahTerakhir?->iqro_akhir : null;

        // Riwayat tabel — sesuai tab filter yang dipilih
        $setorans = $this->filterTingkatan
            ? $semuaSetoran->where('tingkatan', $this->filterTingkatan)->values()
            : $semuaSetoran->values();

        // ===== Statistik umum (selalu dari SEMUA data, tidak ikut filter tab) =====
        $totalSetoran    = $semuaSetoran->count();
        $totalZiyadah    = $semuaSetoran->where('jenis', 'ziyadah')->count();
        $totalMurojaah   = $semuaSetoran->where('jenis', 'murojaah')->count();
        $totalTadarus    = $semuaSetoran->where('jenis', 'tadarus')->count();
        $setoranTerakhir = $semuaSetoran->first();

        // ===== Progress per tingkatan (masing-masing dihitung terpisah) =====

        // Qur'an: dari 604 halaman mushaf
        $totalHalamanQuran = $semuaSetoran
            ->where('tingkatan', 'quran')
            ->where('jenis', 'ziyadah')
            ->sum('jumlah_halaman');
        $persentaseQuran = round(min(($totalHalamanQuran / 604) * 100, 100), 1);

        // Juz Amma: estimasi 1 juz ± 20.13 halaman
        $totalHalamanJuzAmma = $semuaSetoran
            ->where('tingkatan', 'juz_ama')
            ->where('jenis', 'ziyadah')
            ->sum('jumlah_halaman');
        $persentaseJuzAmma = round(min(($totalHalamanJuzAmma / 20.13) * 100, 100), 1);

        // Iqro: dari 6 jilid, ambil jilid tertinggi yang pernah dicapai
        $iqroTertinggi = $semuaSetoran
            ->where('tingkatan', 'iqro')
            ->where('jenis', 'ziyadah')
            ->max('iqro_akhir');
        $persentaseIqro = $iqroTertinggi ? round(min(($iqroTertinggi / 6) * 100, 100), 1) : 0;

        // ===== Distribusi nilai =====
        $distribusiNilai = [
            'A' => $semuaSetoran->where('nilai', 'A')->count(),
            'B' => $semuaSetoran->where('nilai', 'B')->count(),
            'C' => $semuaSetoran->where('nilai', 'C')->count(),
            'D' => $semuaSetoran->where('nilai', 'D')->count(),
        ];
        $nilaiLainnya   = $totalSetoran - array_sum($distribusiNilai);
        $nilaiTerbanyak = collect($distribusiNilai)->sortDesc()->keys()->first() ?? '—';

        return view('livewire.hafalan.show', compact(
            'setorans',
            'tingkatanAktif',
            'iqroAktif',
            'totalSetoran',
            'totalZiyadah',
            'totalMurojaah',
            'totalTadarus',
            'totalHalamanQuran',
            'persentaseQuran',
            'totalHalamanJuzAmma',
            'persentaseJuzAmma',
            'persentaseIqro',
            'iqroTertinggi',
            'distribusiNilai',
            'nilaiLainnya',
            'nilaiTerbanyak',
            'setoranTerakhir',
        ));
    }
}
