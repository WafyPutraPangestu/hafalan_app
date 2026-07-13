<?php

namespace App\Livewire\Admin\Ustadz;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Akun — HafizApp')]
class Edit extends Component
{
    public User $user;

    public string $name = '';
    public string $email = '';
    public string $role = 'ustadz';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role->value;
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)],
            'role' => ['required', Rule::in(array_column(UserRole::cases(), 'value'))],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'name' => 'nama',
            'email' => 'email',
            'role' => 'peran',
            'password' => 'kata sandi',
        ];
    }

    public function update()
    {
        // Cegah admin mengubah peran akunnya sendiri — biar tidak ke-lockout dari halaman admin
        if ($this->user->id === Auth::id() && $this->role !== $this->user->role->value) {
            $this->addError('role', 'Kamu tidak bisa mengubah peran akunmu sendiri.');
            return;
        }

        $validated = $this->validate();

        $this->user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            ...(filled($validated['password'] ?? null) ? ['password' => Hash::make($validated['password'])] : []),
        ]);

        $this->dispatch('notify', title: 'Berhasil', message: 'Akun berhasil diperbarui.');

        return $this->redirect(route('admin.ustadz.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.ustadz.edit');
    }
}
