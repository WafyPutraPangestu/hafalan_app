<?php

namespace App\Livewire\Admin\Siswa;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Siswa — HafizApp')]
class Edit extends Component
{

    public Siswa $siswa;

    #[Validate]
    public string $nama = '';

    #[Validate]
    public string $nis = '';

    #[Validate]
    public string $kelas = '';

    #[Validate]
    public string $tanggal_masuk = '';

    #[Validate]
    public string $status = '';


    // Rules dibuat dinamis karena mengabaikan unique NIS milik siswa ini sendiri
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $this->siswa->id,
            'kelas' => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,alumni',
        ];
    }

    public function mount(Siswa $siswa)
    {
        $this->siswa = $siswa;
        $this->nama = $siswa->nama;
        $this->nis = $siswa->nis;
        $this->kelas = $siswa->kelas;
        $this->tanggal_masuk = $siswa->tanggal_masuk->format('Y-m-d');
        $this->status = $siswa->status;
    }

    public function update()
    {
        $this->validate();


        $this->siswa->update([
            'nama'          => $this->nama,
            'nis'           => $this->nis,
            'kelas'         => $this->kelas,
            'tanggal_masuk' => $this->tanggal_masuk,
            'status'        => $this->status,
        ]);

        $this->dispatch('notify', title: 'Berhasil', message: 'Data siswa berhasil diperbarui.');

        return $this->redirect(route('admin.siswa.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.siswa.edit');
    }
}
