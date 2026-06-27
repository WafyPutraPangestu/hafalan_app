<?php

namespace App\Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public bool $mobileMenuOpen = false;
    public bool $userDropdownOpen = false;
    public bool $notifDropdownOpen = false;

    // Tutup semua dropdown saat klik di luar (dipanggil dari Alpine)
    public function closeAll(): void
    {
        $this->mobileMenuOpen    = false;
        $this->userDropdownOpen  = false;
        $this->notifDropdownOpen = false;
    }

    public function toggleMobileMenu(): void
    {
        $this->mobileMenuOpen   = ! $this->mobileMenuOpen;
        $this->userDropdownOpen  = false;
        $this->notifDropdownOpen = false;
    }

    public function toggleUserDropdown(): void
    {
        $this->userDropdownOpen  = ! $this->userDropdownOpen;
        $this->notifDropdownOpen = false;
        $this->mobileMenuOpen    = false;
    }

    public function toggleNotifDropdown(): void
    {
        $this->notifDropdownOpen = ! $this->notifDropdownOpen;
        $this->userDropdownOpen  = false;
        $this->mobileMenuOpen    = false;
    }

    public function logout(): void
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.component.navbar');
    }
}
