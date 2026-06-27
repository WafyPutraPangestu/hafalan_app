<div class="min-h-screen flex">

    {{-- ============================================================
         PANEL KIRI — Dekoratif / Branding
         Tersembunyi di mobile, muncul di lg+
    ============================================================ --}}
    <div class="hidden lg:flex lg:w-[52%] xl:w-[55%] relative overflow-hidden flex-col"
        style="background: linear-gradient(145deg, var(--color-primary-700) 0%, var(--color-primary-900) 60%, #0a2a27 100%);">

        {{-- Pattern dots --}}
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 28px 28px;">
        </div>

        {{-- Glow accent --}}
        <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full opacity-20"
            style="background: radial-gradient(circle, var(--color-primary-300), transparent 70%);"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full opacity-15"
            style="background: radial-gradient(circle, var(--color-primary-400), transparent 70%);"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col h-full p-10 xl:p-14">

            {{-- Logo --}}
            <a href="/" wire:navigate class="flex items-center gap-2.5 w-fit">
                <div
                    class="w-10 h-10 rounded-xl bg-white/15 backdrop-blur flex items-center justify-center border border-white/20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                </div>
                <span class="text-white font-bold text-lg tracking-tight">HafizApp</span>
            </a>

            {{-- Center content --}}
            <div class="flex-1 flex flex-col justify-center gap-10 mt-12">

                {{-- Headline --}}
                <div class="space-y-4">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/20 bg-white/10 w-fit">
                        <span class="w-1.5 h-1.5 rounded-full bg-[--color-primary-300]"></span>
                        <span class="text-xs font-semibold text-white/80 tracking-wide uppercase">Sistem Hafalan
                            Digital</span>
                    </div>
                    <h1 class="text-4xl xl:text-5xl font-extrabold  leading-tight tracking-tight">
                        <span class="text-white"> Pantau hafalan</span><br>
                        <span style="color: var(--color-primary-300);">lebih mudah</span><br>
                        <span class="text-white">& terstruktur</span>
                    </h1>
                    <p class="text-white/60 text-base leading-relaxed ">
                        Rekam setiap setoran, lacak progres juz, dan beri laporan transparan kepada orang tua — semua
                        dalam satu tempat.
                    </p>
                </div>

                {{-- Feature list --}}
                <div class="space-y-3">
                    @foreach ([['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z', 'text' => 'Catat ziyadah & murojaah per setoran'], ['icon' => 'M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2zm0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z', 'text' => 'Grafik progres hafalan real-time'], ['icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9', 'text' => 'Wali murid monitor tanpa perlu login']] as $feat)
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                                style="background: rgba(255,255,255,0.12);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="{{ $feat['icon'] }}" />
                                </svg>
                            </div>
                            <span class="text-sm text-white/75">{{ $feat['text'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Footer panel kiri --}}
            <div class="text-white/35 text-xs">
                &copy; {{ date('Y') }} HafizApp. Untuk lembaga tahfidz.
            </div>
        </div>
    </div>

    {{-- ============================================================
         PANEL KANAN — Form Login
    ============================================================ --}}
    <div class="flex-1 flex flex-col min-h-screen lg:min-h-0" style="background-color: var(--color-neutral-50);">

        {{-- Mobile: logo di atas --}}
        <div class="lg:hidden flex items-center justify-between px-6 pt-6 pb-4">
            <a href="/" wire:navigate class="navbar-brand">
                <div class="navbar-brand-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                </div>
                <span class="navbar-brand-text">Hafiz<span>App</span></span>
            </a>
        </div>

        {{-- Form area --}}
        <div class="flex-1 flex items-center justify-center px-6 py-10 lg:py-0">
            <div class="w-full ">

                {{-- Heading --}}
                <div class="mb-8">
                    <h2 class="text-2xl font-extrabold tracking-tight"
                        style="color: var(--color-neutral-900); letter-spacing: -0.02em;">
                        Masuk ke akun Anda
                    </h2>
                    <p class="mt-1.5 text-sm" style="color: var(--color-neutral-500);">
                        Belum punya akun?
                        <a wire:navigate href="#" class="font-semibold hover:underline"
                            style="color: var(--color-primary-600);">Hubungi admin</a>
                    </p>
                </div>

                {{-- Form --}}
                <form wire:submit="authenticate" class="space-y-5" novalidate>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email" class="form-label form-label-required">Email</label>
                        <div class="input-wrapper input-icon-left">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                            <input wire:model="email" type="email" id="email" name="email"
                                class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                                placeholder="ustadz@hafizapp.id" autocomplete="username" autofocus>
                        </div>
                        @error('email')
                            <p class="form-error">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" x2="12" y1="8" y2="12" />
                                    <line x1="12" x2="12.01" y1="16" y2="16" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <div class="flex items-center justify-between">
                            <label for="password" class="form-label form-label-required">Password</label>
                            <a wire:navigate href="#" class="text-xs font-semibold hover:underline"
                                style="color: var(--color-primary-600);">
                                Lupa password?
                            </a>
                        </div>
                        <div class="input-wrapper input-icon-left" style="position: relative;">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <input wire:model="password" type="{{ $showPassword ? 'text' : 'password' }}"
                                id="password" name="password"
                                class="form-input {{ $errors->has('password') ? 'error' : '' }}"
                                placeholder="••••••••" autocomplete="current-password"
                                style="padding-right: 2.75rem;">
                            {{-- Toggle show password --}}
                            <button type="button" wire:click="togglePassword"
                                class="absolute right-0 top-0 bottom-0 px-3 flex items-center"
                                style="color: var(--color-neutral-400);"
                                aria-label="{{ $showPassword ? 'Sembunyikan password' : 'Tampilkan password' }}">
                                @if ($showPassword)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                                        <path
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                                        <path
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                                        <line x1="2" x2="22" y1="2" y2="22" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                @endif
                            </button>
                        </div>
                        @error('password')
                            <p class="form-error">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" x2="12" y1="8" y2="12" />
                                    <line x1="12" x2="12.01" y1="16" y2="16" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <label class="form-check cursor-pointer select-none">
                        <input wire:model="remember" type="checkbox" class="form-check-input">
                        <span class="form-check-label" style="color: var(--color-neutral-600);">
                            Ingat saya selama 30 hari
                        </span>
                    </label>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block" wire:loading.attr="disabled"
                        wire:loading.class="loading">
                        <span wire:loading.remove>
                            Masuk
                        </span>
                        <span wire:loading class="flex items-center gap-2">
                            Memproses...
                        </span>
                    </button>

                </form>

                {{-- Divider --}}
                <div class="divider my-7">atau</div>

                {{-- Public access --}}
                <a wire:navigate href="#" class="btn btn-secondary btn-lg btn-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    Cek Hafalan (Wali Murid)
                </a>

                {{-- Catatan kecil --}}
                <p class="text-center mt-6 text-xs" style="color: var(--color-neutral-400);">
                    Akun hanya untuk ustadz & admin.<br>
                    Wali murid tidak perlu login untuk memantau hafalan.
                </p>

            </div>
        </div>
    </div>
</div>
