<nav class="navbar" x-data @click.outside="$wire.closeAll()">
    <div class="navbar-inner">

        {{-- ===================== BRAND LOGO ===================== --}}
        <a wire:navigate href="/" class="navbar-brand">
            <div class="navbar-brand-icon">
                {{-- Icon Quran --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                </svg>
            </div>
            <span class="navbar-brand-text">Hafiz<span>App</span></span>
        </a>

        {{-- ===================== NAV LINKS (DESKTOP) ===================== --}}
        <ul class="navbar-links">

            {{-- Link Public (semua orang bisa lihat) --}}
            <li>
                <a wire:navigate href="/" class="navbar-link {{ request()->is('/') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Beranda
                </a>
            </li>

            {{-- Cek Hafalan (public — wali murid cari via kode) --}}
            <li>
                <a wire:navigate href="{{ route('hafalan.index') }}"
                    class="navbar-link {{ request()->is('cek-hafalan*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    Cek Hafalan
                </a>
            </li>

            @auth
                {{-- Menu khusus yang sudah login --}}
                <li>
                    <a wire:navigate href="{{ route('dashboard') }}"
                        class="navbar-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect width="7" height="7" x="3" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="14" rx="1" />
                            <rect width="7" height="7" x="3" y="14" rx="1" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('admin.siswa.index') }}"
                        class="navbar-link {{ request()->is('admin.siswa.index') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Siswa
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('admin.setoran.index') }}"
                        class="navbar-link {{ request()->is('admin.setoran.index*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" x2="8" y1="13" y2="13" />
                            <line x1="16" x2="8" y1="17" y2="17" />
                            <line x1="10" x2="8" y1="9" y2="9" />
                        </svg>
                        Setoran
                    </a>
                </li>
                <li>
                    <a wire:navigate href="{{ route('admin.laporan') }}"
                        class="navbar-link {{ request()->is('admin.laporan*') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="18" x2="18" y1="20" y2="10" />
                            <line x1="12" x2="12" y1="20" y2="4" />
                            <line x1="6" x2="6" y1="20" y2="14" />
                        </svg>
                        Laporan
                    </a>
                </li>
            @endauth

        </ul>

        {{-- ===================== RIGHT ACTIONS ===================== --}}
        <div class="navbar-actions">

            @auth

                {{-- User Dropdown --}}
                <div class="relative">
                    <button wire:click="toggleUserDropdown"
                        class="flex items-center gap-2 rounded-full pl-1 pr-2.5 py-1 hover:bg-[--color-neutral-100] transition-colors cursor-pointer border border-transparent hover:border-[--color-neutral-200]">
                        <div class="avatar avatar-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span
                            class="text-sm font-semibold text-[--color-neutral-800] hidden sm:block max-w-[120px] truncate">
                            {{ auth()->user()->name }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round" class="text-[--color-neutral-400] hidden sm:block">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    @if ($userDropdownOpen)
                        <div class="dropdown-menu right">
                            {{-- User info header --}}
                            <div class="px-3 py-2.5 border-b border-[--color-neutral-100] mb-1">
                                <p class="text-sm font-semibold text-[--color-neutral-900]">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-[--color-neutral-500] truncate">{{ auth()->user()->email }}</p>
                            </div>


                            <div class="dropdown-divider"></div>

                            <button wire:click="logout" class="dropdown-item danger w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    <polyline points="16 17 21 12 16 7" />
                                    <line x1="21" x2="9" y1="12" y2="12" />
                                </svg>
                                Keluar
                            </button>
                        </div>
                    @endif
                </div>
            @else
                {{-- ===== GUEST — belum login ===== --}}

                <a wire:navigate href="{{ route('login') }}" class="btn btn-primary btn-sm">
                    Login Admin
                </a>
            @endauth

            {{-- Mobile hamburger --}}
            <button wire:click="toggleMobileMenu" class="navbar-toggle lg:hidden" aria-label="Menu">
                @if ($mobileMenuOpen)
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                @endif
            </button>
        </div>
    </div>

    {{-- ===================== MOBILE MENU ===================== --}}
    @if ($mobileMenuOpen)
        <div class="lg:hidden border-t border-[--color-neutral-200] bg-white px-4 py-3 flex flex-col gap-1"
            style="animation: dropdown-in 0.15s ease both;">

            {{-- Public links --}}
            <a wire:navigate href="/" wire:click="closeAll"
                class="navbar-link w-full {{ request()->is('/') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Beranda
            </a>
            <a wire:navigate href="#" wire:click="closeAll"
                class="navbar-link w-full {{ request()->is('cek-hafalan*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                Cek Hafalan
            </a>

            @auth
                <div class="h-px bg-[--color-neutral-200] my-1"></div>
                <p class="text-label px-3 pt-1">Menu</p>

                <a wire:navigate href="#" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="7" height="7" x="3" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="14" rx="1" />
                        <rect width="7" height="7" x="3" y="14" rx="1" />
                    </svg>
                    Dashboard
                </a>
                <a wire:navigate href="#" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->is('siswa*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Siswa
                </a>
                <a wire:navigate href="#" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->is('setoran*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                        <polyline points="14 2 14 8 20 8" />
                    </svg>
                    Setoran
                </a>
                <a wire:navigate href="#" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->is('laporan*') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" x2="18" y1="20" y2="10" />
                        <line x1="12" x2="12" y1="20" y2="4" />
                        <line x1="6" x2="6" y1="20" y2="14" />
                    </svg>
                    Laporan
                </a>

                <div class="h-px bg-[--color-neutral-200] my-1"></div>

                {{-- User info mobile --}}
                <div class="flex items-center gap-3 px-3 py-2">
                    <div class="avatar avatar-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-[--color-neutral-900]">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-[--color-neutral-500]">{{ auth()->user()->email }}</p>
                    </div>
                </div>



                <button wire:click="logout"
                    class="navbar-link w-full text-[--color-danger-600] hover:bg-[--color-danger-50] mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Keluar
                </button>
            @else
                {{-- Guest mobile --}}
                <div class="h-px bg-[--color-neutral-200] my-1"></div>
                <div class="flex gap-2 pt-1 pb-2">
                    <a wire:navigate href="#" class="btn btn-secondary btn-sm flex-1 justify-center">Masuk</a>
                    <a wire:navigate href="#" class="btn btn-primary btn-sm flex-1 justify-center">Daftar</a>
                </div>
            @endauth
        </div>
    @endif
</nav>
