<?php

namespace App\Livewire\Admin;

use App\Models\Setoran;
use App\Models\Siswa;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Laporan Setoran — HafizApp')]
class Laporan extends Component
{
    use WithPagination;

    // Filter Properties
    public $startDate;
    public $endDate;
    public $jenis = '';
    public $tingkatan = '';

    // Custom Search Dropdown Properties
    public $siswa_id = '';
    public string $searchSiswa = '';

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function updatingStartDate()
    {
        $this->resetPage();
    }
    public function updatingEndDate()
    {
        $this->resetPage();
    }
    public function updatingJenis()
    {
        $this->resetPage();
    }
    public function updatingTingkatan()
    {
        $this->resetPage();
    }
    public function updatingSearchSiswa()
    {
        if ($this->siswa_id) {
            $this->siswa_id = '';
        }
        $this->resetPage();
    }

    public function selectSiswa($id, $nama)
    {
        $this->siswa_id = $id;
        $this->searchSiswa = $nama;
        $this->resetPage();
    }

    public function clearSiswa()
    {
        $this->siswa_id = '';
        $this->searchSiswa = '';
        $this->resetPage();
    }

    /**
     * Query dasar dengan semua filter aktif.
     * Dipisah supaya bisa dipakai ulang untuk stats maupun listing,
     * tanpa duplikasi kondisi when().
     */
    protected function baseQuery()
    {
        return Setoran::query()
            ->when($this->startDate, fn($q) => $q->whereDate('tanggal', '>=', $this->startDate))
            ->when($this->endDate, fn($q) => $q->whereDate('tanggal', '<=', $this->endDate))
            ->when($this->jenis, fn($q) => $q->where('jenis', $this->jenis))
            ->when($this->tingkatan, fn($q) => $q->where('tingkatan', $this->tingkatan))
            ->when($this->siswa_id, fn($q) => $q->where('siswa_id', $this->siswa_id));
    }

    public function render()
    {
        // 1. Statistik ringkasan — 1 query saja pakai conditional aggregation (Postgres FILTER)
        $stats = $this->baseQuery()
            ->selectRaw("
                COUNT(*) as total_setoran,
                COALESCE(SUM(jumlah_halaman), 0) as total_halaman,
                COUNT(*) FILTER (WHERE jenis = 'ziyadah') as total_ziyadah,
                COUNT(*) FILTER (WHERE jenis = 'murojaah') as total_murojaah,
                COUNT(*) FILTER (WHERE jenis = 'tadarus') as total_tadarus
            ")
            ->first();

        // 2. Data tabel (paginated) — query baru, hanya select relasi yang dipakai di view
        $setorans = $this->baseQuery()
            ->with([
                'siswa:id,nama,kelas',
                'ustadz:id,name',
            ])
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->paginate(20);

        // 3. Dropdown pencarian santri
        $siswas = [];
        if (strlen($this->searchSiswa) > 0 && empty($this->siswa_id)) {
            $siswas = Siswa::query()
                ->select('id', 'nama', 'kelas')
                ->where('nama', 'ilike', '%' . $this->searchSiswa . '%')
                ->take(5)
                ->get();
        }

        return view('livewire.admin.laporan', [
            'setorans' => $setorans,
            'siswas' => $siswas,
            'totalSetoran' => $stats->total_setoran,
            'totalHalaman' => $stats->total_halaman,
            'totalZiyadah' => $stats->total_ziyadah,
            'totalMurojaah' => $stats->total_murojaah,
            'totalTadarus' => $stats->total_tadarus,
        ]);
    }
}
