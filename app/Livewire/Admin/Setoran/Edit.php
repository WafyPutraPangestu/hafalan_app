<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Setoran — HafizApp')]
class Edit extends Component
{
    public Setoran $setoran;

    public string $searchSiswa = '';

    #[Validate('required')]
    public $siswa_id = null;

    #[Validate('required|date')]
    public string $tanggal = '';

    #[Validate('required')]
    public string $jam = '';

    #[Validate('required|in:ziyadah,murojaah')]
    public string $jenis = '';

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
    public string $nilai = '';

    public string $catatan = '';

    public function mount(Setoran $setoran)
    {
        $this->setoran = $setoran;

        // Pre-fill data ke dalam form
        $this->siswa_id = $setoran->siswa_id;
        $this->searchSiswa = $setoran->siswa->nama; // Nama siswa muncul di input search

        $this->tanggal = $setoran->tanggal;
        $this->jam = \Carbon\Carbon::parse($setoran->jam)->format('H:i');
        $this->jenis = $setoran->jenis;
        $this->surah_awal = $setoran->surah_awal;
        $this->ayat_awal = $setoran->ayat_awal;
        $this->surah_akhir = $setoran->surah_akhir;
        $this->ayat_akhir = $setoran->ayat_akhir;
        $this->jumlah_halaman = $setoran->jumlah_halaman;
        $this->nilai = $setoran->nilai;
        $this->catatan = $setoran->catatan ?? '';
    }

    public function selectSiswa($id, $nama)
    {
        $this->siswa_id = $id;
        $this->searchSiswa = $nama;
    }

    public function update()
    {
        $this->validate();

        $this->setoran->update([
            'siswa_id'       => $this->siswa_id,
            // ustadz_id tidak diubah agar tetap mencatat ustadz penilai aslinya
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

        $this->dispatch('notify', title: 'Berhasil', message: 'Data setoran berhasil diperbarui.');

        return $this->redirect(route('admin.setoran.index'), navigate: true);
    }

    public function render()
    {
        $siswas = [];
        // Jangan tampilkan dropdown jika nama siswa hasil mount tidak diubah
        if (strlen($this->searchSiswa) > 0 && $this->searchSiswa !== $this->setoran->siswa->nama) {
            $siswas = Siswa::query()->where('nama', 'ilike', '%' . $this->searchSiswa . '%')
                ->where('status', 'aktif')
                ->take(5)
                ->get();
        }

        return view('livewire.admin.setoran.edit', compact('siswas'));
    }
}
