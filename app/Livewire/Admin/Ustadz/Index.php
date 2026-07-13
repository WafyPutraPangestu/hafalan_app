<?php

namespace App\Livewire\Admin\Ustadz;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Manajemen Akun — HafizApp')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $roleFilter = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingRoleFilter(): void
    {
        $this->resetPage();
    }

    public function deleteUser(int $id): void
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            $this->dispatch('notify', title: 'Gagal', message: 'Kamu tidak bisa menghapus akunmu sendiri.');
            return;
        }

        if ($user->isAdmin() && User::query()->where('role', UserRole::Admin)->count() <= 1) {
            $this->dispatch('notify', title: 'Gagal', message: 'Minimal harus ada satu akun admin.');
            return;
        }

        $user->delete();
        $this->dispatch('notify', title: 'Dihapus', message: 'Akun berhasil dihapus.');
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($q) {
                $q->where(function ($qq) {
                    $qq->where('name', 'ilike', '%' . $this->search . '%')
                        ->orWhere('email', 'ilike', '%' . $this->search . '%');
                });
            })
            ->when($this->roleFilter, fn($q) => $q->where('role', $this->roleFilter))
            ->orderBy('name')
            ->paginate(15);

        return view('livewire.admin.ustadz.index', compact('users'));
    }
}
