<?php

namespace App\Livewire\Admin;

use App\Models\Setoran;
use App\Models\Siswa;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Dashboard — HafizApp')]
class Dashboard extends Component
{
    public function render()
    {
        // 1. STATISTIK DASAR
        $totalSantri = Siswa::where('status', 'aktif')->count();
        $setoranHariIni = Setoran::whereDate('tanggal', Carbon::today())->count();
        $setoranBulanIni = Setoran::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->count();

        // 2. DATA CHART: Tren 7 Hari Terakhir
        $dates = collect();
        $setoranCounts = collect();
        for ($i = 6; $i >= 0; $i--) {
            // Ambil tanggal mundur dari 6 hari lalu sampai hari ini
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates->push(Carbon::now()->subDays($i)->format('d M')); // Contoh: '21 Jun'

            $count = Setoran::whereDate('tanggal', $date)->count();
            $setoranCounts->push($count);
        }

        // 3. DATA CHART: Rasio Ziyadah vs Murojaah Bulan Ini
        $ziyadahCount = Setoran::whereMonth('tanggal', Carbon::now()->month)
            ->where('jenis', 'ziyadah')->count();
        $murojaahCount = Setoran::whereMonth('tanggal', Carbon::now()->month)
            ->where('jenis', 'murojaah')->count();

        // 4. TABEL & LIST
        $recentSetorans = Setoran::with(['siswa', 'ustadz'])
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->take(5)
            ->get();

        $topSantris = Siswa::where('status', 'aktif')
            ->withCount(['setorans' => function ($query) {
                $query->whereMonth('tanggal', Carbon::now()->month)
                    ->whereYear('tanggal', Carbon::now()->year);
            }])
            ->orderByDesc('setorans_count')
            ->take(4)
            ->get();

        return view('livewire.admin.dashboard', [
            'totalSantri'     => $totalSantri,
            'setoranHariIni'  => $setoranHariIni,
            'setoranBulanIni' => $setoranBulanIni,
            'recentSetorans'  => $recentSetorans,
            'topSantris'      => $topSantris,

            // Konversi ke JSON untuk dipakai di Javascript/Alpine
            'chartTrenDates'  => $dates->toJson(),
            'chartTrenData'   => $setoranCounts->toJson(),
            'chartJenisData'  => collect([$ziyadahCount, $murojaahCount])->toJson(),
        ]);
    }
}
