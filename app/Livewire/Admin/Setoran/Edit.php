<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Setoran — HafizApp')]
class Edit extends Component
{

    public Setoran $setoran;

    public string $searchSiswa = '';
    public $siswa_id = null;

    public string $tanggal = '';
    public string $jam = '';
    public string $jenis = '';
    public string $tingkatan = '';

    // IQRO
    public $iqro_awal;
    public $halaman_iqro_awal;
    public $ayat_iqro_awal;
    public $iqro_akhir;
    public $halaman_iqro_akhir;
    public $ayat_iqro_akhir;

    // JUZ AMA
    public string $surah_awal = '';
    public $ayat_awal;
    public string $surah_akhir = '';
    public $ayat_akhir;

    // QURAN
    public string $juz = '';
    public $halaman_awal;
    public $halaman_akhir;

    // Umum
    public $jumlah_halaman;
    public string $nilai = '';
    public string $catatan = '';

    public function mount(Setoran $setoran)
    {
        abort_unless(Auth::user()->isAdmin(), 403);
        $this->setoran = $setoran;

        $this->siswa_id = $setoran->siswa_id;
        $this->searchSiswa = $setoran->siswa->nama;

        $this->tanggal = $setoran->tanggal instanceof \Carbon\Carbon
            ? $setoran->tanggal->format('Y-m-d')
            : $setoran->tanggal;

        $this->jam = \Carbon\Carbon::parse($setoran->jam)->format('H:i');
        $this->jenis = $setoran->jenis;
        $this->tingkatan = $setoran->tingkatan;

        $this->iqro_awal = $setoran->iqro_awal;
        $this->halaman_iqro_awal = $setoran->halaman_iqro_awal;
        $this->ayat_iqro_awal = $setoran->ayat_iqro_awal;
        $this->iqro_akhir = $setoran->iqro_akhir;
        $this->halaman_iqro_akhir = $setoran->halaman_iqro_akhir;
        $this->ayat_iqro_akhir = $setoran->ayat_iqro_akhir;

        $this->surah_awal = $setoran->surah_awal ?? '';
        $this->ayat_awal = $setoran->ayat_awal;
        $this->surah_akhir = $setoran->surah_akhir ?? '';
        $this->ayat_akhir = $setoran->ayat_akhir;

        $this->juz = $setoran->juz ?? '';
        $this->halaman_awal = $setoran->halaman_awal;
        $this->halaman_akhir = $setoran->halaman_akhir;

        $this->jumlah_halaman = $setoran->jumlah_halaman;
        $this->nilai = $setoran->nilai;
        $this->catatan = $setoran->catatan ?? '';
    }

    public function updatedTingkatan()
    {
        $this->reset([
            'iqro_awal',
            'halaman_iqro_awal',
            'ayat_iqro_awal',
            'iqro_akhir',
            'halaman_iqro_akhir',
            'ayat_iqro_akhir',
            'surah_awal',
            'ayat_awal',
            'surah_akhir',
            'ayat_akhir',
            'juz',
            'halaman_awal',
            'halaman_akhir',
        ]);
    }

    public function selectSiswa($id, $nama)
    {
        $this->siswa_id = $id;
        $this->searchSiswa = $nama;
    }

    protected function rules(): array
    {
        return [
            'siswa_id'       => 'required',
            'tanggal'        => 'required|date',
            'jam'            => 'required',
            'jenis'          => 'required|in:ziyadah,murojaah,tadarus',
            'tingkatan'      => 'required|in:iqro,juz_ama,quran',
            'jumlah_halaman' => 'required|numeric|min:0.1',
            'nilai'          => 'required|string',
            'catatan'        => 'nullable|string',

            'iqro_awal'          => 'required_if:tingkatan,iqro|integer|min:1|max:6',
            'halaman_iqro_awal'  => 'required_if:tingkatan,iqro|integer|min:1',
            'ayat_iqro_awal'     => 'required_if:tingkatan,iqro|integer|min:1',
            'iqro_akhir'         => 'required_if:tingkatan,iqro|integer|min:1|max:6',
            'halaman_iqro_akhir' => 'required_if:tingkatan,iqro|integer|min:1',
            'ayat_iqro_akhir'    => 'required_if:tingkatan,iqro|integer|min:1',

            'surah_awal'  => 'required_if:tingkatan,juz_ama|string',
            'ayat_awal'   => 'required_if:tingkatan,juz_ama|integer|min:1',
            'surah_akhir' => 'required_if:tingkatan,juz_ama|string',
            'ayat_akhir'  => 'required_if:tingkatan,juz_ama|integer|min:1',

            'juz'           => 'required_if:tingkatan,quran|string',
            'halaman_awal'  => 'required_if:tingkatan,quran|integer|min:1',
            'halaman_akhir' => 'required_if:tingkatan,quran|integer|min:1',
        ];
    }

    protected function messages(): array
    {
        return [
            'siswa_id.required' => 'Silakan pilih santri terlebih dahulu.',
        ];
    }

    public function update()
    {
        $this->validate();

        $this->setoran->update([
            'siswa_id'           => $this->siswa_id,
            // ustadz_id tidak diubah agar tetap mencatat ustadz penilai aslinya
            'tanggal'            => $this->tanggal,
            'jam'                => $this->jam,
            'jenis'              => $this->jenis,
            'tingkatan'          => $this->tingkatan,

            'iqro_awal'          => $this->iqro_awal,
            'halaman_iqro_awal'  => $this->halaman_iqro_awal,
            'ayat_iqro_awal'     => $this->ayat_iqro_awal,
            'iqro_akhir'         => $this->iqro_akhir,
            'halaman_iqro_akhir' => $this->halaman_iqro_akhir,
            'ayat_iqro_akhir'    => $this->ayat_iqro_akhir,

            'surah_awal'         => $this->surah_awal ?: null,
            'ayat_awal'          => $this->ayat_awal,
            'surah_akhir'        => $this->surah_akhir ?: null,
            'ayat_akhir'         => $this->ayat_akhir,

            'juz'                => $this->juz ?: null,
            'halaman_awal'       => $this->halaman_awal,
            'halaman_akhir'      => $this->halaman_akhir,

            'jumlah_halaman'     => $this->jumlah_halaman,
            'nilai'              => $this->nilai,
            'catatan'            => $this->catatan,
        ]);

        $this->dispatch('notify', title: 'Berhasil', message: 'Data setoran berhasil diperbarui.');

        return $this->redirect(route('admin.setoran.index'), navigate: true);
    }

    public function render()
    {
        $siswas = [];
        if (strlen($this->searchSiswa) > 0 && $this->searchSiswa !== $this->setoran->siswa->nama) {
            $siswas = Siswa::query()
                ->where('nama', 'ilike', '%' . $this->searchSiswa . '%')
                ->where('status', 'aktif')
                ->take(5)
                ->get();
        }

        return view('livewire.admin.setoran.edit', compact('siswas'));
    }
}
