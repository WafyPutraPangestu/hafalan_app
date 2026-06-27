<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')]           // pakai layout tanpa navbar
#[Title('Masuk — HafizApp')]
class Login extends Component
{
    #[Validate('required|email|max:255')]
    public string $email = '';

    #[Validate('required|string|min:6')]
    public string $password = '';

    public bool $remember = false;

    public bool $showPassword = false;

    // -------------------------------------------------------
    // Rate limiter key — per IP + email supaya tidak brute force
    // -------------------------------------------------------
    private function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    private function checkRateLimit(): bool
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $seconds = RateLimiter::availableIn($this->throttleKey());
            $this->addError('email', "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.");
            return false;
        }
        return true;
    }

    // -------------------------------------------------------
    // Toggle show/hide password (dipanggil dari blade)
    // -------------------------------------------------------
    public function togglePassword(): void
    {
        $this->showPassword = ! $this->showPassword;
    }

    // -------------------------------------------------------
    // Proses login
    // -------------------------------------------------------
    public function authenticate(): void
    {
        $this->validate();

        if (! $this->checkRateLimit()) {
            return;
        }

        if (Auth::attempt(
            ['email' => $this->email, 'password' => $this->password],
            $this->remember
        )) {
            RateLimiter::clear($this->throttleKey());
            session()->regenerate();

            $this->dispatch(
                'notify',
                type: 'success',
                title: 'Selamat datang kembali!',
                message: 'Berhasil masuk ke HafizApp.',
            );

            $this->redirectIntended('/dashboard', navigate: true);
            return;
        }

        // Catat percobaan gagal untuk rate limiter
        RateLimiter::hit($this->throttleKey(), decaySeconds: 120);

        $this->addError('email', 'Email atau password yang dimasukkan salah.');
        $this->reset('password');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
