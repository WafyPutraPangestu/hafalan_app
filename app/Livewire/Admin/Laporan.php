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

    // Custom Search Dropdown Properties
    public $siswa_id = '';
    public string $searchSiswa = '';

    public function mount()
    {
        // Default filter: Bulan berjalan
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    // Reset pagination ketika filter berubah
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
    public function updatingSearchSiswa()
    {
        if ($this->siswa_id) {
            $this->siswa_id = ''; // Reset ID jika user mengetik ulang
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

    public function render()
    {
        // 1. Build Query dengan Filter
        $query = Setoran::with(['siswa', 'ustadz'])
            ->when($this->startDate, fn($q) => $q->whereDate('tanggal', '>=', $this->startDate))
            ->when($this->endDate, fn($q) => $q->whereDate('tanggal', '<=', $this->endDate))
            ->when($this->jenis, fn($q) => $q->where('jenis', $this->jenis))
            ->when($this->siswa_id, fn($q) => $q->where('siswa_id', $this->siswa_id));

        // 2. Hitung Statistik Ringkasan (Berdasarkan filter saat ini)
        $statsQuery = clone $query;
        $totalSetoran = $statsQuery->count();
        $totalHalaman = $statsQuery->sum('jumlah_halaman');
        $totalZiyadah = (clone $statsQuery)->where('jenis', 'ziyadah')->count();
        $totalMurojaah = (clone $statsQuery)->where('jenis', 'murojaah')->count();

        // 3. Ambil Data Tabel (Paginated)
        $setorans = $query->orderByDesc('tanggal')->orderByDesc('jam')->paginate(20);

        // 4. Ambil Data Santri untuk Dropdown (Hanya jika belum memilih siswa)
        $siswas = [];
        if (strlen($this->searchSiswa) > 0 && empty($this->siswa_id)) {
            $siswas = Siswa::where('nama', 'ilike', '%' . $this->searchSiswa . '%')->take(5)->get();
        }

        return view('livewire.admin.laporan', compact(
            'setorans',
            'siswas',
            'totalSetoran',
            'totalHalaman',
            'totalZiyadah',
            'totalMurojaah'
        ));
    }
}
