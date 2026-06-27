<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Data Setoran — HafizApp')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $jenisFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingJenisFilter()
    {
        $this->resetPage();
    }

    public function deleteSetoran($id)
    {
        Setoran::findOrFail($id)->delete();
        $this->dispatch('notify', title: 'Dihapus', message: 'Data setoran berhasil dihapus.');
    }

    public function render()
    {
        $setorans = Setoran::with(['siswa', 'ustadz'])
            ->when($this->search, function ($query) {
                // Pencarian berdasarkan nama siswa yang berelasi
                $query->whereHas('siswa', function ($q) {
                    $q->where('nama', 'ilike', '%' . $this->search . '%');
                });
            })
            ->when($this->jenisFilter, function ($query) {
                $query->where('jenis', $this->jenisFilter);
            })
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->paginate(15);

        return view('livewire.admin.setoran.index', compact('setorans'));
    }
}
