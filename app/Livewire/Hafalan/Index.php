<?php

namespace App\Livewire\Hafalan;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')] // Pastikan pakai layout tanpa navbar/sidebar admin
#[Title('Cek Hafalan Santri — HafizApp')]
class Index extends Component
{
    #[Validate('required', message: 'Kode akses tidak boleh kosong.')]
    #[Validate('exists:siswas,kode_akses', message: 'Kode akses tidak ditemukan! Periksa kembali kode dari sekolah.')]
    public string $kode_akses = '';

    public function cari()
    {
        $this->validate();

        // Jika kode valid, arahkan ke halaman detail (Dashboard Wali Murid)
        return $this->redirect(route('hafalan.show', $this->kode_akses), navigate: true);
    }

    public function render()
    {
        return view('livewire.hafalan.index');
    }
}
