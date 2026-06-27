<?php

namespace App\Livewire\Admin\Siswa;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Data Siswa — HafizApp')]
class Index extends Component
{
    use WithPagination;

    // Properti pencarian real-time
    public string $search = '';
    public string $statusFilter = '';

    // Reset halaman jika melakukan pencarian
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    // Method untuk menghapus data (Dipanggil dari modal Alpine JS)
    public function deleteSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);



        $siswa->delete();

        // Kirim event untuk notifikasi toast (opsional)
        $this->dispatch('notify', title: 'Berhasil', message: 'Data siswa berhasil dihapus.');
    }

    public function render()
    {
        $siswas = Siswa::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'ilike', '%' . $this->search . '%')
                    ->orWhere('nis', 'ilike', '%' . $this->search . '%')
                    ->orWhere('kelas', 'ilike', '%' . $this->search . '%');
            })
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('livewire.admin.siswa.index', compact('siswas'));
    }
}
