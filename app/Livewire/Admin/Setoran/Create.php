<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Input Setoran — HafizApp')]
class Create extends Component
{
    // Properti untuk Custom Search Dropdown
    public string $searchSiswa = '';
    public $siswa_id = null;

    // Properti Form Setoran (umum)
    public string $tanggal = '';
    public string $jam = '';
    public string $jenis = 'ziyadah';       // ziyadah | murojaah | tadarus
    public string $tingkatan = 'iqro';      // iqro | juz_ama | quran

    // ===== Field khusus IQRO =====
    public $iqro_awal;
    public $halaman_iqro_awal;
    public $ayat_iqro_awal;
    public $iqro_akhir;
    public $halaman_iqro_akhir;
    public $ayat_iqro_akhir;

    // ===== Field khusus JUZ AMA =====
    public string $surah_awal = '';
    public $ayat_awal;
    public string $surah_akhir = '';
    public $ayat_akhir;

    // ===== Field khusus QURAN =====
    public string $juz = '';
    public $halaman_awal;
    public $halaman_akhir;

    // Umum
    public $jumlah_halaman;
    public string $nilai = 'A';
    public string $catatan = '';

    public function mount()
    {
        abort_unless(Auth::user()->isUstadz(), 403);
        $this->tanggal = now()->format('Y-m-d');
        $this->jam = now()->format('H:i');
    }

    // Reset field yang tidak relevan setiap kali tingkatan berubah
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

    /**
     * Aturan validasi dinamis berdasarkan tingkatan yang dipilih.
     */
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

            // Tambahkan 'nullable|' pada semua rule di bawah ini
            'iqro_awal'          => 'nullable|required_if:tingkatan,iqro|integer|min:1|max:6',
            'halaman_iqro_awal'  => 'nullable|required_if:tingkatan,iqro|integer|min:1',
            'ayat_iqro_awal'     => 'nullable|required_if:tingkatan,iqro|integer|min:1',
            'iqro_akhir'         => 'nullable|required_if:tingkatan,iqro|integer|min:1|max:6',
            'halaman_iqro_akhir' => 'nullable|required_if:tingkatan,iqro|integer|min:1',
            'ayat_iqro_akhir'    => 'nullable|required_if:tingkatan,iqro|integer|min:1',

            'surah_awal'  => 'nullable|required_if:tingkatan,juz_ama|string',
            'ayat_awal'   => 'nullable|required_if:tingkatan,juz_ama|integer|min:1',
            'surah_akhir' => 'nullable|required_if:tingkatan,juz_ama|string',
            'ayat_akhir'  => 'nullable|required_if:tingkatan,juz_ama|integer|min:1',

            'juz'           => 'nullable|required_if:tingkatan,quran|string',
            'halaman_awal'  => 'nullable|required_if:tingkatan,quran|integer|min:1',
            'halaman_akhir' => 'nullable|required_if:tingkatan,quran|integer|min:1',
        ];
    }

    protected function messages(): array
    {
        return [
            'siswa_id.required' => 'Silakan pilih santri terlebih dahulu.',
        ];
    }

    public function save()
    {
        $this->validate();

        Setoran::create([
            'siswa_id'           => $this->siswa_id,
            'ustadz_id'          => Auth::id(),
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

        $this->dispatch('notify', title: 'Alhamdulillah', message: 'Setoran hafalan berhasil disimpan.');
        // dd($this->siswa_id, $this->tanggal, $this->jenis, $this->tingkatan);
        return $this->redirect(route('admin.setoran.index'), navigate: true);
    }

    public function render()
    {
        $siswas = [];
        if (strlen($this->searchSiswa) > 0) {
            // ILIKE khusus PostgreSQL (case-insensitive search)
            $siswas = Siswa::query()
                ->where('nama', 'ilike', '%' . $this->searchSiswa . '%')
                ->where('status', 'aktif')
                ->take(5)
                ->get();
        }

        return view('livewire.admin.setoran.create', compact('siswas'));
    }
}
