<?php

namespace App\Livewire\Admin\Setoran;

use App\Models\Setoran;
use Illuminate\Support\Facades\Auth;
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
    public string $tingkatanFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingJenisFilter()
    {
        $this->resetPage();
    }

    public function updatingTingkatanFilter()
    {
        $this->resetPage();
    }

    public function deleteSetoran($id)
    {
        // Hanya admin yang boleh hapus — ustadz tidak diberi wewenang override/hapus
        abort_unless(Auth::user()->isAdmin(), 403);

        Setoran::findOrFail($id)->delete();
        $this->dispatch('notify', title: 'Dihapus', message: 'Data setoran berhasil dihapus.');
    }

    public function render()
    {
        $user = Auth::user();

        $setorans = Setoran::query()
            ->select(['id', 'siswa_id', 'ustadz_id', 'tanggal', 'jam', 'jenis', 'tingkatan', 'nilai', 'jumlah_halaman'])
            ->with([
                'siswa:id,nama,kelas',
                'ustadz:id,name',
            ])
            ->when($user->isUstadz(), function ($query) use ($user) {
                // Ustadz cuma lihat setoran yang dia input sendiri
                $query->where('ustadz_id', $user->id);
            })
            ->when($this->search, function ($query) {
                $query->whereHas('siswa', function ($q) {
                    $q->where('nama', 'ilike', '%' . $this->search . '%');
                });
            })
            ->when($this->jenisFilter, function ($query) {
                $query->where('jenis', $this->jenisFilter);
            })
            ->when($this->tingkatanFilter, function ($query) {
                $query->where('tingkatan', $this->tingkatanFilter);
            })
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->paginate(15);

        return view('livewire.admin.setoran.index', compact('setorans'));
    }
}
