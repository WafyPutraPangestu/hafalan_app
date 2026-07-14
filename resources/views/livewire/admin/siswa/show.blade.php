<div style="padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto;">

    {{-- Breadcrumb --}}
    <div
        style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.75rem; font-size: 0.8125rem; font-weight: 600; color: var(--color-neutral-500);">
        <a href="{{ route('admin.siswa.index') }}" wire:navigate
            style="color: var(--color-neutral-500); text-decoration: none; transition: color 0.15s;"
            onmouseover="this.style.color='var(--color-neutral-900)'"
            onmouseout="this.style.color='var(--color-neutral-500)'">
            Data Siswa
        </a>

        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
        </svg>
        <span style="color: var(--color-neutral-900);">{{ $siswa->nama }}</span>
    </div>

    {{-- Form Cetak Laporan (per periode) --}}
    <form action="{{ route('admin.siswa.cetak', $siswa) }}" method="GET" target="_blank" x-data="{ dari: '', sampai: '' }"
        style="display: flex; align-items: flex-end; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
        <div class="form-group" style="width: auto;">
            <label class="form-label">Dari</label>
            <input type="date" name="dari" x-model="dari" :max="sampai || null" required class="form-input">
        </div>
        <div class="form-group" style="width: auto;">
            <label class="form-label">Sampai</label>
            <input type="date" name="sampai" x-model="sampai" :min="dari || null" required class="form-input">
        </div>
        <button type="submit" :disabled="!dari || !sampai"
            class="btn btn-primary disabled:opacity-50 disabled:cursor-not-allowed">
            🖨️ Cetak Laporan
        </button>
    </form>

    {{-- Hero Profile Section --}}
    <div class="card" style="margin-bottom: 1.5rem; overflow: visible;">
        <div
            style="
                    background: linear-gradient(135deg, var(--color-neutral-900) 0%, #1a1a2e 100%);
                    border-radius: var(--radius-xl) var(--radius-xl) 0 0;
                    padding: 2rem 2rem 3.5rem;
                    position: relative;
                    overflow: hidden;
                ">
            {{-- Decorative pattern --}}
            <div
                style="
                        position: absolute; inset: 0; opacity: 0.04;
                        background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0);
                        background-size: 24px 24px;
                    ">
            </div>

            <div
                style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem; flex-wrap: wrap; position: relative;">
                <div style="display: flex; align-items: center; gap: 1.25rem;">
                    {{-- Avatar --}}
                    <div
                        style="
                                width: 72px; height: 72px;
                                background: var(--color-primary-400);
                                border-radius: 50%;
                                display: flex; align-items: center; justify-content: center;
                                font-size: 1.75rem; font-weight: 800;
                                color: var(--color-neutral-900);
                                border: 3px solid rgba(255,255,255,0.2);
                                flex-shrink: 0;
                            ">
                        {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                    </div>
                    <div>
                        <div style="display: flex; align-items: center; gap: 0.625rem; margin-bottom: 0.375rem;">
                            <h2
                                style="color: white; margin: 0; font-size: 1.5rem; font-weight: 800; letter-spacing: -0.02em;">
                                {{ $siswa->nama }}
                            </h2>
                            @if ($siswa->status === 'aktif')
                                <span class="badge badge-success badge-dot" style="font-size: 0.7rem;">Aktif</span>
                            @else
                                <span class="badge badge-neutral badge-dot" style="font-size: 0.7rem;">Alumni</span>
                            @endif
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.875rem; flex-wrap: wrap;">
                            <span
                                style="color: rgba(255,255,255,0.6); font-size: 0.8125rem; font-weight: 600; display: flex; align-items: center; gap: 0.375rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>
                                NIS {{ $siswa->nis }}
                            </span>
                            <span style="color: rgba(255,255,255,0.4);">•</span>
                            <span
                                style="color: rgba(255,255,255,0.6); font-size: 0.8125rem; font-weight: 600; display: flex; align-items: center; gap: 0.375rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                    <path d="M6 12v5c3 3 9 3 12 0v-5" />
                                </svg>
                                {{ $siswa->kelas }}
                            </span>
                            <span style="color: rgba(255,255,255,0.4);">•</span>
                            <span
                                style="color: rgba(255,255,255,0.6); font-size: 0.8125rem; font-weight: 600; display: flex; align-items: center; gap: 0.375rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                    <line x1="16" x2="16" y1="2" y2="6" />
                                    <line x1="8" x2="8" y1="2" y2="6" />
                                    <line x1="3" x2="21" y1="10" y2="10" />
                                </svg>
                                Masuk {{ $siswa->tanggal_masuk->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 0.625rem; flex-wrap: wrap;">
                    <a href="{{ route('admin.siswa.edit', $siswa) }}" wire:navigate class="btn btn-sm"
                        style="background: rgba(255,255,255,0.1); color: white; border-color: rgba(255,255,255,0.2); backdrop-filter: blur(4px);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </div>

        {{--
            Stats row: sebelumnya dipaksa 4 kolom sejajar (repeat(4, 1fr)) dengan margin
            kiri/kanan tetap 1.5rem — di layar kecil ini bikin card kepotong/overflow jadi
            bisa discroll horizontal. Sekarang pakai utility yang sudah ada di design system
            (.grid-stats + .card-stat) yang otomatis reflow: 1 kolom di HP kecil, 2 kolom di
            ≥400px, 4 kolom di ≥768px — dan tiap card tetap punya border+radius sendiri jadi
            tidak ada lagi trik "border-right: none" yang rawan patah.
        --}}
        @php
            $totalSetoran = $siswa->setorans->count();
            $ziyadah = $siswa->setorans->where('jenis', 'ziyadah')->count();
            $murojaah = $siswa->setorans->where('jenis', 'murojaah')->count();
            $totalHalaman = $siswa->setorans->sum('jumlah_halaman');
        @endphp

        <div class="grid-stats" style="margin: -1.5rem 1rem 0; position: relative; z-index: 1;">
            <div class="card-stat">
                <div class="card-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                        <polyline points="14 2 14 8 20 8" />
                    </svg>
                </div>
                <p class="card-stat-label">Total Setoran</p>
                <p class="card-stat-value">{{ $totalSetoran }}</p>
                <p class="card-stat-sub">sesi hafalan</p>
            </div>

            <div class="card-stat">
                <div class="card-stat-icon" style="background: var(--color-primary-300);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 20v-6M6 20V10M18 20V4" />
                    </svg>
                </div>
                <p class="card-stat-label" style="color: var(--color-primary-600);">Ziyadah</p>
                <p class="card-stat-value" style="color: var(--color-primary-600);">{{ $ziyadah }}</p>
                <p class="card-stat-sub">hafalan baru</p>
            </div>

            <div class="card-stat">
                <div class="card-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                        <path d="M3 3v5h5" />
                    </svg>
                </div>
                <p class="card-stat-label">Murojaah</p>
                <p class="card-stat-value">{{ $murojaah }}</p>
                <p class="card-stat-sub">pengulangan</p>
            </div>

            <div class="card-stat">
                <div class="card-stat-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                </div>
                <p class="card-stat-label">Total Halaman</p>
                <p class="card-stat-value">{{ number_format($totalHalaman, 1) }}</p>
                <p class="card-stat-sub">hal. disetorkan</p>
            </div>
        </div>

        <div style="height: 1.75rem;"></div>
    </div>

    {{-- Kode Akses Banner --}}
    <div
        style="
                display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;
                background: linear-gradient(135deg, var(--color-primary-50), var(--color-primary-100));
                border: 1.5px solid var(--color-primary-300);
                border-radius: var(--radius-xl);
                padding: 1.125rem 1.5rem;
                margin-bottom: 1.5rem;
            ">
        <div style="display: flex; align-items: center; gap: 0.875rem;">
            <div
                style="width: 40px; height: 40px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" style="color: var(--color-neutral-900);">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
            </div>
            <div>
                <p
                    style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--color-neutral-600); margin-bottom: 0.125rem;">
                    Kode Akses Wali Murid</p>
                <code
                    style="font-size: 1.375rem; font-weight: 800; letter-spacing: 0.2em; color: var(--color-neutral-900); font-family: monospace;">{{ $siswa->kode_akses }}</code>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <p
                style="font-size: 0.8125rem; color: var(--color-neutral-600); font-weight: 600; max-width: 280px; line-height: 1.5;">
                Bagikan kode ini ke orang tua santri untuk memantau progres hafalan secara mandiri.
            </p>
        </div>
    </div>

    {{-- Riwayat Setoran --}}
    <div class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div
                    style="width: 36px; height: 36px; background: var(--color-neutral-100); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                        <polyline points="14 2 14 8 20 8" />
                        <line x1="16" x2="8" y1="13" y2="13" />
                        <line x1="16" x2="8" y1="17" y2="17" />
                        <line x1="10" x2="8" y1="9" y2="9" />
                    </svg>
                </div>
                <h5 style="margin: 0; font-weight: 800; text-transform: uppercase; letter-spacing: 0.03em;">Riwayat
                    Setoran</h5>
            </div>
            <span class="badge badge-primary">{{ $siswa->setorans->count() }} catatan</span>
        </div>

        <div class="table-wrapper" style="border: none; border-radius: 0; box-shadow: none;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal & Jam</th>
                        <th>Jenis</th>
                        <th>Tingkatan</th>
                        <th>Detail Hafalan</th>
                        <th>Halaman</th>
                        <th>Nilai</th>
                        <th>Catatan Ustadz</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa->setorans->sortByDesc('tanggal') as $setoran)
                        <tr>
                            <td>
                                <p style="font-weight: 700; font-size: 0.875rem; color: var(--color-neutral-900);">
                                    {{ $setoran->tanggal->format('d M Y') }}
                                </p>
                                <p
                                    style="font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600; margin-top: 0.1rem;">
                                    {{ \Illuminate\Support\Carbon::parse($setoran->jam)->format('H:i') }} WIB
                                </p>
                            </td>
                            <td>
                                @if ($setoran->jenis === 'ziyadah')
                                    <span class="badge pill-ziyadah">Ziyadah</span>
                                @elseif ($setoran->jenis === 'murojaah')
                                    <span class="badge pill-murojaah">Murojaah</span>
                                @else
                                    <span class="badge pill-tadarus">Tadarus</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $tingkatanLabel = match ($setoran->tingkatan) {
                                        'iqro' => 'Iqro',
                                        'juz_ama' => "Juz 'Amma",
                                        'quran' => "Al-Qur'an",
                                        default => ucfirst($setoran->tingkatan),
                                    };
                                @endphp
                                <span class="badge badge-juz">{{ $tingkatanLabel }}</span>
                            </td>
                            <td>
                                {{--
                                    Sebelumnya kolom ini cuma nampilin surah_awal/surah_akhir,
                                    padahal itu cuma valid buat tingkatan "juz_ama". Untuk
                                    "iqro" dan "quran" field-nya beda, jadi harus dicabang
                                    per tingkatan (sama seperti logic di PDF).
                                --}}
                                <div style="font-size: 0.875rem;">
                                    @if ($setoran->tingkatan === 'iqro')
                                        <p style="font-weight: 700; color: var(--color-neutral-900);">
                                            Iqro {{ $setoran->iqro_awal }} → Iqro {{ $setoran->iqro_akhir }}
                                        </p>
                                        <p
                                            style="color: var(--color-neutral-500); font-size: 0.75rem; font-weight: 600;">
                                            Hal. {{ $setoran->halaman_iqro_awal }}:{{ $setoran->ayat_iqro_awal }}
                                            → Hal. {{ $setoran->halaman_iqro_akhir }}:{{ $setoran->ayat_iqro_akhir }}
                                        </p>
                                    @elseif ($setoran->tingkatan === 'juz_ama')
                                        <p style="font-weight: 700; color: var(--color-neutral-900);">
                                            {{ $setoran->surah_awal }}
                                        </p>
                                        <p
                                            style="color: var(--color-neutral-500); font-size: 0.75rem; font-weight: 600;">
                                            Ayat {{ $setoran->ayat_awal }}
                                            @if ($setoran->surah_awal !== $setoran->surah_akhir || $setoran->ayat_awal !== $setoran->ayat_akhir)
                                                → {{ $setoran->surah_akhir }} : {{ $setoran->ayat_akhir }}
                                            @else
                                                — {{ $setoran->ayat_akhir }}
                                            @endif
                                        </p>
                                    @else
                                        {{-- quran --}}
                                        <p style="font-weight: 700; color: var(--color-neutral-900);">
                                            {{ $setoran->juz }}
                                        </p>
                                        <p
                                            style="color: var(--color-neutral-500); font-size: 0.75rem; font-weight: 600;">
                                            Hal. {{ $setoran->halaman_awal }} – {{ $setoran->halaman_akhir }}
                                        </p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="info-chip">{{ $setoran->jumlah_halaman }} hal.</span>
                            </td>
                            <td>
                                @php
                                    $nilaiUpper = strtoupper((string) $setoran->nilai);
                                    $nilaiClass = match (true) {
                                        in_array($nilaiUpper, ['A', 'B', 'C']) => 'grade-' . strtolower($nilaiUpper),
                                        is_numeric($setoran->nilai) => 'grade-neutral',
                                        default => 'grade-d',
                                    };
                                @endphp
                                <span class="grade-badge {{ $nilaiClass }}">{{ $setoran->nilai }}</span>
                            </td>
                            <td style="max-width: 200px;">
                                @if ($setoran->catatan)
                                    <p class="truncate-2"
                                        style="font-size: 0.8125rem; color: var(--color-neutral-600); line-height: 1.5;">
                                        {{ $setoran->catatan }}
                                    </p>
                                @else
                                    <span
                                        style="color: var(--color-neutral-300); font-size: 0.8125rem; font-weight: 600;">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state" style="padding: 2.5rem 1.5rem;">
                                    <div class="empty-state-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                                            <polyline points="14 2 14 8 20 8" />
                                        </svg>
                                    </div>
                                    <p class="empty-state-title">Belum Ada Setoran</p>
                                    <p class="empty-state-desc">Santri ini belum memiliki catatan setoran hafalan.
                                        Input setoran pertama melalui menu Setoran.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
