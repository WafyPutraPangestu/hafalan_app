<?php

namespace App\Livewire\Admin\Siswa;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Detail Siswa — HafizApp')]
class Show extends Component
{
    public Siswa $siswa;

    public function mount(Siswa $siswa)
    {
        // Memuat data setoran hafalan siswa (Relasi) agar langsung bisa ditampilkan
        $this->siswa = $siswa->load('setorans');
    }

    public function render()
    {
        return view('livewire.admin.siswa.show');
    }
}
