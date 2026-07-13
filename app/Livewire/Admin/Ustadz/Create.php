<?php

namespace App\Livewire\Admin\Ustadz;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Tambah Akun — HafizApp')]
class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $role = 'ustadz';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'role' => ['required', Rule::in(array_column(UserRole::cases(), 'value'))],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

    public function save()
    {
        $validated = $this->validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->dispatch('notify', title: 'Berhasil', message: 'Akun baru berhasil dibuat.');

        return $this->redirect(route('admin.ustadz.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.ustadz.create');
    }
}
