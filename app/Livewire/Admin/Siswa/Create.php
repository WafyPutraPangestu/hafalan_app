<?php

namespace App\Livewire\Admin\Siswa;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
#[Title('Tambah Siswa — HafizApp')]
class Create extends Component
{


    #[Validate('required|string|max:255')]
    public string $nama = '';

    #[Validate('required|string|unique:siswas,nis')]
    public string $nis = '';

    #[Validate('required|string|max:50')]
    public string $kelas = '';

    #[Validate('required|date')]
    public string $tanggal_masuk = '';

    #[Validate('required|in:aktif,alumni')]
    public string $status = 'aktif';



    public function save()
    {
        $this->validate();


        Siswa::create([
            'nama'          => $this->nama,
            'nis'           => $this->nis,
            'kelas'         => $this->kelas,
            'tanggal_masuk' => $this->tanggal_masuk,
            'status'        => $this->status,
            'kode_akses'    => strtoupper(Str::random(6)), // Generate unik 6 karakter
        ]);

        $this->dispatch('notify', title: 'Berhasil', message: 'Siswa baru berhasil ditambahkan.');

        return $this->redirect(route('admin.siswa.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.siswa.create');
    }
}
