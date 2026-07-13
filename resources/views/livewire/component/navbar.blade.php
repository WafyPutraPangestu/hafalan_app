{{-- NAVBAR --}}
<nav class="navbar flex" x-data @click.outside="$wire.closeAll()">
    <div class="navbar-inner ">

        {{-- BRAND --}}
        <a wire:navigate href="/" class="navbar-brand">
            <div class="navbar-brand-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                </svg>
            </div>
            <span class="navbar-brand-text">Hafiz<span>App</span></span>
        </a>

        {{-- NAV LINKS (DESKTOP) --}}
        <ul class="navbar-links">
            <li>
                <a wire:navigate href="/" class="navbar-link {{ request()->is('/') ? 'active' : '' }}">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('hafalan.index') }}"
                    class="navbar-link {{ request()->routeIs('hafalan.*') ? 'active' : '' }}">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    Cek Hafalan
                </a>
            </li>

            @auth
                <li aria-hidden="true" class="navbar-divider-item"></li>

                {{-- Dashboard — admin only --}}

                <li>
                    <a wire:navigate href="{{ route('dashboard') }}"
                        class="navbar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="7" x="3" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="14" rx="1" />
                            <rect width="7" height="7" x="3" y="14" rx="1" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                @if (auth()->user()->isAdmin())
                    <li>
                        <a wire:navigate href="{{ route('admin.ustadz.index') }}"
                            class="navbar-link {{ request()->routeIs('admin.ustadz.*') ? 'active' : '' }}">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M18.5 9.5 21 12l-2.5 2.5" />
                            </svg>
                            Akun
                        </a>
                    </li>

                    {{-- Siswa — admin only --}}
                    <li>
                        <a wire:navigate href="{{ route('admin.siswa.index') }}"
                            class="navbar-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Siswa
                        </a>
                    </li>
                @endif

                {{-- Setoran — admin & ustadz --}}
                <li>
                    <a wire:navigate href="{{ route('admin.setoran.index') }}"
                        class="navbar-link {{ request()->routeIs('admin.setoran.*') ? 'active' : '' }}">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" x2="8" y1="13" y2="13" />
                            <line x1="16" x2="8" y1="17" y2="17" />
                        </svg>
                        Setoran
                    </a>
                </li>

                {{-- Laporan — admin only --}}
                @if (auth()->user()->isAdmin())
                    <li>
                        <a wire:navigate href="{{ route('admin.laporan') }}"
                            class="navbar-link {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" x2="18" y1="20" y2="10" />
                                <line x1="12" x2="12" y1="20" y2="4" />
                                <line x1="6" x2="6" y1="20" y2="14" />
                            </svg>
                            Laporan
                        </a>
                    </li>
                @endif
            @endauth
        </ul>

        {{-- RIGHT ACTIONS --}}
        <div class="navbar-actions">
            @auth
                <div class="relative">
                    <button wire:click="toggleUserDropdown" class="navbar-user-btn">
                        <div class="avatar avatar-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="navbar-user-name hidden sm:block">
                            {{ auth()->user()->name }}
                        </span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                            class="text-[--color-neutral-400] hidden sm:block">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    @if ($userDropdownOpen)
                        <div class="dropdown-menu right">
                            <div class="px-3 py-2.5 border-b border-[--color-neutral-100] mb-1">
                                <p class="text-sm font-semibold text-[--color-neutral-900]">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-[--color-neutral-500] truncate">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <button wire:click="logout" class="dropdown-item danger w-full">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
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
                <a wire:navigate href="{{ route('login') }}" class="btn btn-primary btn-sm">
                    Login Admin
                </a>
            @endauth

            <button wire:click="toggleMobileMenu" class="navbar-toggle lg:hidden" aria-label="Menu">
                @if ($mobileMenuOpen)
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                @else
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                @endif
            </button>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    @if ($mobileMenuOpen)
        {{-- SESUDAH --}}
        <div class="navbar-mobile-panel lg:hidden border-t border-[--color-neutral-200] px-4 py-3 flex flex-col gap-1"
            style="animation: dropdown-in 0.15s ease both;">
            <a wire:navigate href="/" wire:click="closeAll"
                class="navbar-link w-full {{ request()->is('/') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <polyline points="9 22 9 12 15 12 15 22" />
                </svg>
                Beranda
            </a>
            <a wire:navigate href="{{ route('hafalan.index') }}" wire:click="closeAll"
                class="navbar-link w-full {{ request()->routeIs('hafalan.*') ? 'active' : '' }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                Cek Hafalan
            </a>

            @auth
                <div class="h-px bg-[--color-neutral-200] my-1"></div>
                <p class="text-label px-3 pt-1">Menu {{ auth()->user()->isAdmin() ? 'Admin' : 'Ustadz' }}</p>


                <a wire:navigate href="{{ route('dashboard') }}" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="7" height="7" x="3" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="3" rx="1" />
                        <rect width="7" height="7" x="14" y="14" rx="1" />
                        <rect width="7" height="7" x="3" y="14" rx="1" />
                    </svg>
                    Dashboard
                </a>
                @if (auth()->user()->isAdmin())
                    <li>
                        <a wire:navigate href="{{ route('admin.ustadz.index') }}"
                            class="navbar-link {{ request()->routeIs('admin.ustadz.*') ? 'active' : '' }}">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M18.5 9.5 21 12l-2.5 2.5" />
                            </svg>
                            Akun
                        </a>
                    </li>
                    <a wire:navigate href="{{ route('admin.siswa.index') }}" wire:click="closeAll"
                        class="navbar-link w-full {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Siswa
                    </a>
                @endif

                <a wire:navigate href="{{ route('admin.setoran.index') }}" wire:click="closeAll"
                    class="navbar-link w-full {{ request()->routeIs('admin.setoran.*') ? 'active' : '' }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                        <polyline points="14 2 14 8 20 8" />
                    </svg>
                    Setoran
                </a>

                @if (auth()->user()->isAdmin())
                    <a wire:navigate href="{{ route('admin.laporan') }}" wire:click="closeAll"
                        class="navbar-link w-full {{ request()->routeIs('admin.laporan*') ? 'active' : '' }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" x2="18" y1="20" y2="10" />
                            <line x1="12" x2="12" y1="20" y2="4" />
                            <line x1="6" x2="6" y1="20" y2="14" />
                        </svg>
                        Laporan
                    </a>
                @endif
                <div class="h-px bg-[--color-neutral-200] my-1"></div>
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
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Keluar
                </button>
            @else
                <div class="h-px bg-[--color-neutral-200] my-1"></div>
                <div class="flex gap-2 pt-1 pb-2">
                    <a wire:navigate href="{{ route('login') }}" class="btn btn-primary btn-sm flex-1 justify-center">
                        Login Admin
                    </a>
                </div>
            @endauth
        </div>
    @endif
</nav>
<style>
    /* Navbar pill container */
    .navbar-links {
        display: none;
        align-items: center;
        gap: 2px;
        list-style: none;
        margin: 0 auto;
        padding: 3px;
        background: var(--color-neutral-100);
        border-radius: 10px;
    }

    @media (min-width: 1024px) {
        .navbar-links {
            display: flex;
        }
    }

    /* Divider di antara link group */
    .navbar-divider-item {
        width: 1px;
        height: 16px;
        background: var(--color-neutral-300);
        margin: 0 4px;
        flex-shrink: 0;
    }

    /* User button */
    .navbar-user-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 4px 10px 4px 4px;
        background: transparent;
        border: 1px solid var(--color-neutral-200);
        border-radius: var(--radius-full);
        cursor: pointer;
        transition: all var(--duration-fast);
        font-family: var(--font-sans);
    }

    .navbar-user-btn:hover {
        background: var(--color-neutral-100);
        border-color: var(--color-neutral-300);
    }

    .navbar-user-name {
        font-size: 0.8125rem;
        font-weight: 600;
        color: var(--color-neutral-900);
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Active state — pill style (override yang lama) */
    .navbar-link.active {
        color: var(--color-neutral-900);
        background: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px rgba(0, 0, 0, .04);
        font-weight: 700;
    }
</style>
