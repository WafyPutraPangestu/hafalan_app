<div>
    {{-- NAV SPACER --}}
    <div style="height: var(--navbar-height);"></div>

    {{-- HERO --}}
    <section
        style="background: var(--color-neutral-0); border-bottom: 1px solid var(--color-neutral-200); overflow: hidden;">
        <div class="container-app" style="padding-top: 4rem; padding-bottom: 4.5rem;">
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="hero-grid">

                <div style="order: 1;">
                    <div
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: var(--color-primary-200); border: 1.5px solid var(--color-neutral-900); border-radius: var(--radius-full); padding: 0.3125rem 0.875rem; margin-bottom: 1.5rem;">
                        <span
                            style="width: 6px; height: 6px; background: var(--color-neutral-900); border-radius: 50%;"></span>
                        <span
                            style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;">Sistem
                            Hafalan Digital</span>
                    </div>

                    <h1 style="margin: 0 0 1.25rem; max-width: 600px;">
                        Satu sistem untuk seluruh
                        <span class="text-highlight">tim pengajar</span>
                        Anda
                    </h1>

                    <p class="text-lead" style="max-width: 480px; margin-bottom: 2rem;">
                        Catat setiap setoran, lacak progres juz, dan sajikan laporan transparan kepada wali murid —
                        semua tanpa kertas, tanpa ribet.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center;">
                        <a href="#" wire:navigate class="btn btn-primary btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                            Mulai Sekarang
                        </a>
                        <a href="#cara-kerja" class="btn btn-secondary btn-lg">Lihat Cara Kerja</a>
                    </div>

                    <div
                        style="display: flex; align-items: center; gap: 1rem; margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--color-neutral-200);">
                        <div class="avatar-group">
                            <div class="avatar avatar-sm">A</div>
                            <div class="avatar avatar-sm">B</div>
                            <div class="avatar avatar-sm">F</div>
                            <div class="avatar avatar-sm">Z</div>
                        </div>
                        <div>
                            <div style="font-size: 0.875rem; font-weight: 700; color: var(--color-neutral-900);">
                                Dipercaya 120+ ustadz</div>
                            <div style="font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600;">di
                                berbagai lembaga tahfidz</div>
                        </div>
                    </div>
                </div>

                <div style="order: 2; position: relative;">
                    <div
                        style="
                        background: var(--color-neutral-900);
                        border-radius: var(--radius-2xl);
                        padding: 2.5rem 2rem;
                        text-align: center;
                        position: relative;
                        overflow: hidden;
                        border: 2px solid var(--color-neutral-900);
                    ">
                        <div
                            style="position: absolute; inset: 0; opacity: 0.07; background-image: radial-gradient(circle, var(--color-primary-400) 1.5px, transparent 1.5px); background-size: 24px 24px;">
                        </div>
                        <div style="position: relative; z-index: 1;">
                            <p class="font-arabic"
                                style="font-size: clamp(1.75rem, 4vw, 2.75rem); color: white; margin: 0 0 1.25rem; line-height: 2.2;">
                                وَرَتِّلِ الْقُرْآنَ تَرْتِيلًا
                            </p>
                            <div
                                style="height: 2px; background: var(--color-primary-400); width: 48px; margin: 0 auto 1rem;">
                            </div>
                            <p
                                style="font-size: 0.8125rem; color: rgba(255,255,255,0.6); font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;">
                                QS. Al-Muzzammil: 4</p>
                            <p
                                style="font-size: 0.9375rem; color: rgba(255,255,255,0.85); font-weight: 500; margin-top: 0.5rem; font-style: italic;">
                                "Dan bacalah Al-Quran dengan tartil"</p>
                        </div>
                    </div>

                    <div
                        style="position: absolute; top: -16px; right: -12px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-xl); padding: 0.75rem 1rem; box-shadow: 4px 4px 0 var(--color-neutral-900);">
                        <div
                            style="font-size: 1.25rem; font-weight: 800; color: var(--color-neutral-900); line-height: 1;">
                            1.847</div>
                        <div
                            style="font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-neutral-700);">
                            Setoran</div>
                    </div>

                    <div
                        style="position: absolute; bottom: -16px; left: -12px; background: white; border: 2px solid var(--color-neutral-900); border-radius: var(--radius-xl); padding: 0.75rem 1rem; box-shadow: 4px 4px 0 var(--color-neutral-900); display: flex; align-items: center; gap: 0.5rem;">
                        <div style="width: 8px; height: 8px; background: var(--color-success-500); border-radius: 50%;">
                        </div>
                        <div style="font-size: 0.8125rem; font-weight: 800; color: var(--color-neutral-900);">204 Siswa
                            Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STATS STRIP --}}
    <section style="background: var(--color-neutral-900);">
        <div class="container-app" style="padding-top: 0; padding-bottom: 0;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); border-left: 1px solid rgba(255,255,255,0.08);"
                class="stats-strip">
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08); background: rgba(163,230,53,0.06);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--color-primary-400); line-height: 1;">
                        30 Juz</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Target hafalan penuh</div>
                </div>
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: white; line-height: 1;">
                        2 Tipe</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Ziyadah & Murojaah</div>
                </div>
                <div style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: white; line-height: 1;">
                        100%</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Transparan ke wali</div>
                </div>
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); background: rgba(163,230,53,0.06);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--color-primary-400); line-height: 1;">
                        Real-time</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Progres terkini</div>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section
        style="background: var(--color-neutral-0); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="max-width: 560px; margin-bottom: 3.5rem;">
                <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Fitur Utama</p>
                <h2 style="margin: 0 0 1rem;">Semua yang dibutuhkan tim tahfidz</h2>
                <p class="text-lead">Hafizapp menggabungkan pencatatan setoran, manajemen siswa, dan pelaporan dalam
                    satu alur yang sederhana.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: 1px; background: var(--color-neutral-200); border: 1px solid var(--color-neutral-200); border-radius: var(--radius-2xl); overflow: hidden;"
                class="feature-grid">

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-900); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--color-neutral-900);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" x2="8" y1="13" y2="13" />
                                <line x1="16" x2="8" y1="17" y2="17" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Ziyadah & Murojaah</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Catat Setoran Kilat</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Input ziyadah dan murojaah per setoran — surah, ayat, nilai, dan catatan ustadz. Tersimpan
                            dalam hitungan detik.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" x2="18" y1="20" y2="10" />
                                <line x1="12" x2="12" y1="20" y2="4" />
                                <line x1="6" x2="6" y1="20" y2="14" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Real-time</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Grafik Progres Otomatis</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Sistem otomatis menghitung total halaman, juz yang sudah ditempuh, dan menampilkannya dalam
                            grafik mudah dibaca.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Multi kelas</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Manajemen Siswa & Kelas</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Kelola data siswa, kelompok, dan ustadz pengampu. Setiap siswa mendapat kode unik untuk
                            akses wali murid.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Catatan</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Catatan Langsung dari Ustadz</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Setiap setoran bisa disertai catatan kualitas dari ustadz — terlihat oleh wali murid saat
                            membuka riwayat anaknya.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-900); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--color-neutral-900);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Privasi terjaga</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Akses Wali Tanpa Login</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Wali murid cukup masukkan kode unik siswa untuk melihat seluruh riwayat setoran dan progres
                            hafalan — tanpa perlu daftar akun.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Export PDF</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Laporan PDF Bulanan</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Cetak laporan progres per siswa atau per kelas dalam format PDF rapi — siap dibagikan ke
                            orang tua atau lembaga.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section id="cara-kerja"
        style="background: var(--color-neutral-50); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="max-width: 560px; margin-bottom: 3.5rem;">
                <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Cara Kerja</p>
                <h2 style="margin: 0 0 1rem;">Dari setoran ke laporan, dalam tiga langkah</h2>
                <p class="text-lead">Alur yang dirancang untuk ustadz yang sibuk. Tidak ada langkah berlebihan.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;" class="how-grid">

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        01</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Siswa setor hafalan</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Siswa membaca hafalan di depan ustadz, baik hafalan baru (ziyadah) maupun pengulangan
                            (murojaah).</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Bisa dilakukan
                            harian, mingguan, atau kapan saja — sistem menyesuaikan.</p>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        02</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Ustadz input di aplikasi</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Admin atau ustadz mencatat surah, rentang ayat, nilai kualitas, dan catatan tambahan dalam
                            satu form singkat.</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Tersimpan otomatis
                            dengan cap waktu dan nama ustadz yang menginput.</p>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        03</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Wali murid pantau langsung</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Cukup buka HafizApp, masukkan kode siswa, dan seluruh riwayat hafalan anak langsung
                            terlihat.</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Tidak perlu akun,
                            tidak perlu install aplikasi. Buka dari browser HP mana saja.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CEK HAFALAN PUBLIC --}}
    <section
        style="background: var(--color-neutral-0); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="cek-grid">

                <div>
                    <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Untuk Wali
                        Murid</p>
                    <h2 style="margin: 0 0 1rem;">Pantau hafalan anak tanpa login</h2>
                    <p class="text-lead" style="margin-bottom: 1.5rem;">Masukkan kode unik yang diberikan saat
                        pendaftaran. Lihat semua riwayat setoran, progres juz, dan catatan ustadz — kapan saja, dari
                        mana saja.</p>
                    <ul
                        style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Tidak perlu daftar atau login
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Data aman — kode unik per siswa
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Lihat progres hafalan real-time
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Baca catatan langsung dari ustadz
                        </li>
                    </ul>
                </div>

                <div
                    style="background: white; border: 2px solid var(--color-neutral-900); border-radius: var(--radius-2xl); padding: 2rem; box-shadow: 6px 6px 0 var(--color-neutral-900);">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div
                            style="width: 40px; height: 40px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 1rem; font-weight: 800; margin: 0; color: var(--color-neutral-900);">
                                Cek Hafalan Anak</p>
                            <p style="font-size: 0.8125rem; color: var(--color-neutral-500); margin: 0;">Masukkan kode
                                siswa</p>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1rem;">
                        <label class="form-label">Kode Siswa</label>
                        <div class="input-wrapper input-icon-left">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="14" height="20" x="5" y="2" rx="2" />
                                <path d="M12 18h.01" />
                            </svg>
                            <input type="text" class="form-input" placeholder="Contoh: HFZ-A3K9"
                                style="text-transform: uppercase; letter-spacing: 0.1em;">
                        </div>
                        <p class="form-hint">Kode didapat saat pendaftaran dari pihak lembaga</p>
                    </div>

                    <a href="#" wire:navigate class="btn btn-primary btn-block btn-lg">
                        Lihat Hafalan
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>

                    <div
                        style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--color-neutral-200);">
                        <p
                            style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-neutral-400); margin-bottom: 0.75rem;">
                            Contoh tampilan:</p>
                        <div
                            style="display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem; background: var(--color-neutral-50); border-radius: var(--radius-lg); border: 1px solid var(--color-neutral-200);">
                            <div class="avatar avatar-md">A</div>
                            <div style="flex: 1; min-width: 0;">
                                <p
                                    style="font-size: 0.875rem; font-weight: 800; margin: 0; color: var(--color-neutral-900);">
                                    Ahmad Fauzi</p>
                                <p style="font-size: 0.75rem; color: var(--color-neutral-500); margin: 0;">Kelas
                                    Tahfidz A · 3 Juz 2 Halaman</p>
                            </div>
                            <span class="badge badge-primary">Aktif</span>
                        </div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-wrapper">
                                <div class="progress-labels">
                                    <span class="progress-label">Progres Hafalan</span>
                                    <span class="progress-value">11%</span>
                                </div>
                                <div class="progress-track">
                                    <div class="progress-fill" style="width: 11%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section style="background: var(--color-neutral-900); padding: 5rem 0;">
        <div class="container-app">
            <div style="max-width: 480px; margin-bottom: 3rem;">
                <p class="text-label" style="color: var(--color-primary-400); margin-bottom: 0.75rem;">Testimoni</p>
                <h2 style="margin: 0; color: white;">Kenapa lembaga tahfidz memilih HafizApp</h2>
            </div>
            <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;" class="testimonial-grid">

                <div
                    style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="var(--color-primary-400)" stroke="none">
                        <path
                            d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                        <path
                            d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z" />
                    </svg>
                    <p
                        style="font-size: 1rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin: 0; font-style: italic;">
                        "Dulu input manual di buku, sekarang cukup beberapa ketuk. Wali murid langsung bisa lihat
                        sendiri."</p>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div class="avatar avatar-sm"
                            style="background: var(--color-primary-400); color: var(--color-neutral-900); border-color: var(--color-primary-400);">
                            R</div>
                        <div>
                            <p style="font-size: 0.875rem; font-weight: 800; margin: 0; color: white;">Ust. Ridwan,
                                S.Pd.I</p>
                            <p style="font-size: 0.75rem; margin: 0; color: rgba(255,255,255,0.4); font-weight: 600;">
                                Koordinator Tahfidz, Pesantren Al-Fath</p>
                        </div>
                    </div>
                </div>

                <div
                    style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="var(--color-primary-400)" stroke="none">
                        <path
                            d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                        <path
                            d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z" />
                    </svg>
                    <p
                        style="font-size: 1rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin: 0; font-style: italic;">
                        "Anaknya susah cerita soal hafalannya, tapi sekarang saya bisa pantau sendiri dari HP. Lebih
                        tenang."</p>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div class="avatar avatar-sm"
                            style="background: var(--color-primary-400); color: var(--color-neutral-900); border-color: var(--color-primary-400);">
                            H</div>
                        <div>
                            <p style="font-size: 0.875rem; font-weight: 800; margin: 0; color: white;">Ibu Hamidah</p>
                            <p style="font-size: 0.75rem; margin: 0; color: rgba(255,255,255,0.4); font-weight: 600;">
                                Wali murid kelas 5 Tahfidz</p>
                        </div>
                    </div>
                </div>

                <div
                    style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.75rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="var(--color-primary-400)" stroke="none">
                        <path
                            d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                        <path
                            d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z" />
                    </svg>
                    <p
                        style="font-size: 1rem; color: rgba(255,255,255,0.85); line-height: 1.7; margin: 0; font-style: italic;">
                        "Laporan bulanannya rapi banget. Langsung saya print buat arsip yayasan."</p>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <div class="avatar avatar-sm"
                            style="background: var(--color-primary-400); color: var(--color-neutral-900); border-color: var(--color-primary-400);">
                            A</div>
                        <div>
                            <p style="font-size: 0.875rem; font-weight: 800; margin: 0; color: white;">Ust. Ahmad Fauzi
                            </p>
                            <p style="font-size: 0.75rem; margin: 0; color: rgba(255,255,255,0.4); font-weight: 600;">
                                Kepala Program Tahfidz</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section
        style="background: var(--color-primary-400); padding: 5rem 0; border-top: 2px solid var(--color-neutral-900); border-bottom: 2px solid var(--color-neutral-900);">
        <div class="container-app" style="text-align: center;">
            <p class="text-label" style="color: var(--color-neutral-700); margin-bottom: 0.75rem;">Mulai Hari Ini</p>
            <h2 style="margin: 0 0 1rem; color: var(--color-neutral-900);">Bangun sistem hafalan yang terstruktur</h2>
            <p
                style="font-size: 1.0625rem; color: var(--color-neutral-700); max-width: 440px; margin: 0 auto 2.5rem; line-height: 1.65;">
                Bergabung dengan ratusan ustadz yang sudah beralih dari catatan manual ke sistem digital.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center;">
                <a href="#" wire:navigate class="btn btn-secondary btn-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                    Masuk ke Dashboard
                </a>
                <a href="#cara-kerja" class="btn btn-ghost btn-xl" style="color: var(--color-neutral-800);">
                    Pelajari lebih lanjut →
                </a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer style="background: var(--color-neutral-900); padding: 3rem 0 2rem;">
        <div class="container-app">
            <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; margin-bottom: 2.5rem;"
                class="footer-grid">
                <div>
                    <a href="/" wire:navigate class="navbar-brand"
                        style="margin-bottom: 1rem; display: inline-flex;">
                        <div class="navbar-brand-icon"
                            style="background: var(--color-primary-400); color: var(--color-neutral-900);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                            </svg>
                        </div>
                        <span class="navbar-brand-text" style="color: white;">Hafiz<span
                                style="color: var(--color-primary-400);">App</span></span>
                    </a>
                    <p
                        style="font-size: 0.875rem; color: rgba(255,255,255,0.4); line-height: 1.7; max-width: 260px; margin: 0;">
                        Sistem manajemen hafalan Al-Quran untuk lembaga tahfidz modern.</p>
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                    <div>
                        <p
                            style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.3); margin: 0 0 0.875rem;">
                            Aplikasi</p>
                        <ul
                            style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Dashboard</a>
                            </li>
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Data
                                    Siswa</a></li>
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Input
                                    Setoran</a></li>
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Laporan
                                    PDF</a></li>
                        </ul>
                    </div>
                    <div>
                        <p
                            style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.3); margin: 0 0 0.875rem;">
                            Lainnya</p>
                        <ul
                            style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Cek
                                    Hafalan</a></li>
                            <li><a href="#" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Tentang
                                    Kami</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div
                style="padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.08); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
                <p style="font-size: 0.8125rem; color: rgba(255,255,255,0.3); margin: 0;">&copy; {{ date('Y') }}
                    HafizApp. Dibuat untuk lembaga tahfidz.</p>
                <p class="font-arabic" style="font-size: 1rem; color: rgba(255,255,255,0.25); margin: 0;">بِسْمِ
                    اللّٰهِ</p>
            </div>
        </div>
    </footer>

    <style>
        .hero-grid {
            grid-template-columns: 1fr !important;
        }

        .how-grid {
            grid-template-columns: 1fr !important;
        }

        .cek-grid {
            grid-template-columns: 1fr !important;
        }

        .footer-grid {
            grid-template-columns: 1fr !important;
        }

        .testimonial-grid {
            grid-template-columns: 1fr !important;
        }

        .feature-grid {
            grid-template-columns: 1fr !important;
        }

        @media (min-width: 1024px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .how-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }

            .cek-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .feature-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }
        }

        @media (min-width: 768px) {
            .testimonial-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }
        }

        .feat-card:hover {
            background: var(--color-neutral-50) !important;
        }
    </style>
</div>
