<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Input Setoran — HafizApp')]
class Create extends Component
{
    // Properti untuk Custom Search Dropdown
    public string $searchSiswa = '';

    #[Validate('required', message: 'Silakan pilih santri terlebih dahulu.')]
    public $siswa_id = null;

    // Properti Form Setoran
    #[Validate('required|date')]
    public string $tanggal = '';

    #[Validate('required')]
    public string $jam = '';

    #[Validate('required|in:ziyadah,murojaah')]
    public string $jenis = 'ziyadah';

    #[Validate('required|string')]
    public string $surah_awal = '';

    #[Validate('required|integer|min:1')]
    public $ayat_awal;

    #[Validate('required|string')]
    public string $surah_akhir = '';

    #[Validate('required|integer|min:1')]
    public $ayat_akhir;

    #[Validate('required|numeric|min:0.1')]
    public $jumlah_halaman;

    #[Validate('required|string')]
    public string $nilai = 'A';

    public string $catatan = '';

    public function mount()
    {
        // Set default tanggal dan jam hari ini
        $this->tanggal = now()->format('Y-m-d');
        $this->jam = now()->format('H:i');
    }

    // Method dipanggil dari Alpine.js saat user memilih siswa di dropdown
    public function selectSiswa($id, $nama)
    {
        $this->siswa_id = $id;
        $this->searchSiswa = $nama;
    }

    public function save()
    {
        $this->validate();

        Setoran::create([
            'siswa_id'       => $this->siswa_id,
            'ustadz_id'      => Auth::id(), // Ustadz yang sedang login
            'tanggal'        => $this->tanggal,
            'jam'            => $this->jam,
            'jenis'          => $this->jenis,
            'surah_awal'     => $this->surah_awal,
            'ayat_awal'      => $this->ayat_awal,
            'surah_akhir'    => $this->surah_akhir,
            'ayat_akhir'     => $this->ayat_akhir,
            'jumlah_halaman' => $this->jumlah_halaman,
            'nilai'          => $this->nilai,
            'catatan'        => $this->catatan,
        ]);

        $this->dispatch('notify', title: 'Alhamdulillah', message: 'Setoran hafalan berhasil disimpan.');

        return $this->redirect(route('admin.setoran.index'), navigate: true);
    }

    public function render()
    {
        // Ambil 5 data siswa teratas berdasarkan pencarian
        $siswas = [];
        if (strlen($this->searchSiswa) > 0) {
            $siswas = Siswa::query()->where('nama', 'ilike', '%' . $this->searchSiswa . '%')
                ->where('status', 'aktif') // Hanya santri aktif
                ->take(5)
                ->get();
        }

        return view('livewire.admin.setoran.create', compact('siswas'));
    }
}
