<div style="padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto;">
    {{-- TOMBOL KEMBALI --}}
    <div class="mb-4">
        <a wire:navigate href="{{ route('hafalan.index') }}" class="btn btn-ghost btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6" />
            </svg>
            Kembali
        </a>
    </div>

    {{-- ===================== HERO SISWA ===================== --}}
    <div class="card mb-4">
        <div class="card-body" style="padding: 1.5rem;">
            <div class="flex items-start gap-5">
                {{-- <div class="avatar avatar-xl flex-shrink-0">
                    {{ strtoupper(substr($siswa->nama, 0, 2)) }}
                </div> --}}

                <div class="flex-1 min-w-0">
                    <h1 class="text-2xl font-extrabold tracking-tight text-[--color-neutral-900] leading-tight">
                        {{ $siswa->nama }}
                    </h1>

                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        @if ($siswa->kelas)
                            <span class="info-chip">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                    <path d="M6 12v5c3 3 9 3 12 0v-5" />
                                </svg>
                                {{ $siswa->kelas }}
                            </span>
                        @endif

                        {{-- Badge level aktif — pengganti info ustadz yang sudah tidak ada di kolom siswa --}}
                        @if ($tingkatanAktif)
                            <span class="badge badge-primary badge-dot">
                                @if ($tingkatanAktif === 'iqro')
                                    Sedang di: Iqro {{ $iqroAktif ?? '-' }}
                                @elseif($tingkatanAktif === 'juz_ama')
                                    Sedang di: Juz Amma
                                @else
                                    Sedang di: Al-Qur'an
                                @endif
                            </span>
                        @endif

                        <span class="badge badge-{{ $siswa->status === 'aktif' ? 'success' : 'neutral' }} badge-dot">
                            {{ ucfirst($siswa->status) }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2 mt-3">
                        <span class="text-label text-[--color-neutral-400]">Kode akses</span>
                        <code
                            class="text-sm font-bold bg-[--color-neutral-100] text-[--color-neutral-900]
                                      px-2 py-0.5 rounded-md tracking-wider">
                            {{ $siswa->kode_akses }}
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== STAT CARDS ===================== --}}
    <div class="grid-stats mb-4">
        <div class="card-stat" style="border-color: var(--color-primary-300); background: var(--color-primary-50);">
            <div class="card-stat-icon" style="background: var(--color-primary-200);">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                </svg>
            </div>
            <div>
                <div class="card-stat-label" style="color: var(--color-primary-700);">Halaman dihafal (Qur'an)</div>
                <div class="card-stat-value" style="color: var(--color-primary-800);">{{ $totalHalamanQuran }}</div>
                <div class="card-stat-sub">dari 604 halaman</div>
            </div>
        </div>

        <div class="card-stat">
            <div class="card-stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                    <polyline points="14 2 14 8 20 8" />
                </svg>
            </div>
            <div>
                <div class="card-stat-label">Total setoran</div>
                <div class="card-stat-value">{{ $totalSetoran }}</div>
                <div class="card-stat-sub">{{ $totalZiyadah }} ziyadah · {{ $totalMurojaah }} muroja'ah ·
                    {{ $totalTadarus }} tadarus</div>
            </div>
        </div>

        <div class="card-stat">
            <div class="card-stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="17 1 21 5 17 9" />
                    <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                    <polyline points="7 23 3 19 7 15" />
                    <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                </svg>
            </div>
            <div>
                <div class="card-stat-label">Muroja'ah</div>
                <div class="card-stat-value">{{ $totalMurojaah }}</div>
                <div class="card-stat-sub">sesi review hafalan</div>
            </div>
        </div>

        <div class="card-stat">
            <div class="card-stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon
                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
            </div>
            <div>
                <div class="card-stat-label">Nilai terbanyak</div>
                <div class="card-stat-value">{{ $nilaiTerbanyak }}</div>
                <div class="card-stat-sub">{{ $distribusiNilai[$nilaiTerbanyak] ?? 0 }}x dapat nilai ini</div>
            </div>
        </div>
    </div>

    {{-- ===================== BANNER SETORAN TERAKHIR ===================== --}}
    @if ($setoranTerakhir)
        <div class="alert alert-primary mb-4" style="border-radius: var(--radius-lg);">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="alert-icon flex-shrink-0"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </svg>
            <div>
                <span class="alert-title">Setoran terakhir</span>
                <span class="text-sm">
                    @if ($setoranTerakhir->tingkatan === 'iqro')
                        Iqro {{ $setoranTerakhir->iqro_awal }} (Hal {{ $setoranTerakhir->halaman_iqro_awal }})
                        @if ($setoranTerakhir->iqro_awal != $setoranTerakhir->iqro_akhir)
                            – Iqro {{ $setoranTerakhir->iqro_akhir }} (Hal {{ $setoranTerakhir->halaman_iqro_akhir }})
                        @endif
                    @elseif($setoranTerakhir->tingkatan === 'juz_ama')
                        {{ $setoranTerakhir->surah_awal }} ayat {{ $setoranTerakhir->ayat_awal }}
                        @if (
                            $setoranTerakhir->surah_awal !== $setoranTerakhir->surah_akhir ||
                                $setoranTerakhir->ayat_awal != $setoranTerakhir->ayat_akhir)
                            – {{ $setoranTerakhir->surah_akhir }} ayat {{ $setoranTerakhir->ayat_akhir }}
                        @endif
                    @else
                        {{ strtoupper($setoranTerakhir->juz) }}, Hal {{ $setoranTerakhir->halaman_awal }}
                        @if ($setoranTerakhir->halaman_awal != $setoranTerakhir->halaman_akhir)
                            – {{ $setoranTerakhir->halaman_akhir }}
                        @endif
                    @endif
                    ·
                    <span class="font-bold">{{ ucfirst($setoranTerakhir->jenis) }}</span>
                    · Nilai <strong>{{ $setoranTerakhir->nilai }}</strong>
                    @if ($setoranTerakhir->ustadz)
                        · {{ $setoranTerakhir->ustadz->name }}
                    @endif
                </span>
                <div class="text-caption mt-0.5">
                    {{ \Carbon\Carbon::parse($setoranTerakhir->tanggal)->translatedFormat('l, d F Y') }}
                    · {{ $setoranTerakhir->jam ? \Illuminate\Support\Str::substr($setoranTerakhir->jam, 0, 5) : '' }}
                </div>
            </div>
        </div>
    @endif

    {{-- ===================== PROGRESS (3 LEVEL) + DISTRIBUSI NILAI ===================== --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">

        {{-- Progress per tingkatan --}}
        <div class="card">
            <div class="card-header">
                <h2 class="h6 mb-0">Progress hafalan</h2>
            </div>
            <div class="card-body flex flex-col gap-4">

                {{-- Iqro — hanya tampil kalau pernah ada setoran iqro --}}
                @if ($iqroTertinggi)
                    <div class="progress-wrapper">
                        <div class="progress-labels">
                            <span class="progress-label">Iqro</span>
                            <span class="progress-value">Jilid {{ $iqroTertinggi }} / 6</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $persentaseIqro }}%"></div>
                        </div>
                    </div>
                @endif

                {{-- Juz Amma — hanya tampil kalau pernah ada setoran juz amma --}}
                @if ($totalHalamanJuzAmma > 0)
                    <div class="progress-wrapper">
                        <div class="progress-labels">
                            <span class="progress-label">Juz Amma</span>
                            <span class="progress-value">{{ $persentaseJuzAmma }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" style="width: {{ $persentaseJuzAmma }}%"></div>
                        </div>
                    </div>
                @endif

                {{-- Qur'an — selalu tampil sebagai tujuan akhir --}}
                <div class="progress-wrapper">
                    <div class="progress-labels">
                        <span class="progress-label">Al-Qur'an (604 halaman)</span>
                        <span class="progress-value">{{ $totalHalamanQuran }} / 604</span>
                    </div>
                    <div class="progress-track progress-track-lg">
                        <div class="progress-fill" style="width: {{ $persentaseQuran }}%"></div>
                    </div>
                    <p class="text-caption mt-1">{{ $persentaseQuran }}% dari keseluruhan mushaf</p>
                </div>

                {{-- Visual 30 Juz — hanya relevan kalau sudah masuk tingkatan quran --}}
                @if ($totalHalamanQuran > 0)
                    <div>
                        <p class="text-label mb-2">Estimasi per juz (30 juz)</p>
                        <div class="flex flex-wrap gap-1">
                            @php $halamanPerJuz = 20.13; @endphp
                            @for ($juz = 1; $juz <= 30; $juz++)
                                @php
                                    $selesai = $totalHalamanQuran >= $juz * $halamanPerJuz;
                                    $sebagian = !$selesai && $totalHalamanQuran > ($juz - 1) * $halamanPerJuz;
                                @endphp
                                <div title="Juz {{ $juz }}"
                                    style="width:18px;height:18px;border-radius:4px;font-size:8px;font-weight:800;
                                           display:flex;align-items:center;justify-content:center;
                                           background:{{ $selesai ? 'var(--color-primary-400)' : ($sebagian ? 'var(--color-primary-200)' : 'var(--color-neutral-100)') }};
                                           color:{{ $selesai ? 'var(--color-neutral-900)' : 'var(--color-neutral-500)' }};
                                           border:1px solid {{ $selesai ? 'var(--color-neutral-900)' : 'var(--color-neutral-200)' }}">
                                    {{ $juz }}
                                </div>
                            @endfor
                        </div>
                        <p class="text-caption mt-2">Hijau tua = selesai · Hijau muda = sebagian · Abu = belum</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Distribusi Nilai --}}
        <div class="card">
            <div class="card-header">
                <h2 class="h6 mb-0">Distribusi nilai</h2>
                <span class="text-caption">{{ $totalSetoran }} setoran</span>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-2 gap-3">
                    @foreach ([
        'A' => ['label' => 'Mumtaz', 'class' => 'grade-a'],
        'B' => ['label' => 'Jayyid', 'class' => 'grade-b'],
        'C' => ['label' => 'Maqbul', 'class' => 'grade-c'],
        'D' => ['label' => "Dha'if", 'class' => 'grade-d'],
    ] as $huruf => $meta)
                        @php $jml = $distribusiNilai[$huruf]; @endphp
                        <div
                            class="flex items-center gap-3 p-3 rounded-xl border border-[--color-neutral-100]
                                    bg-[--color-neutral-50]">
                            <div class="grade-badge {{ $meta['class'] }} flex-shrink-0">{{ $huruf }}</div>
                            <div>
                                <div class="text-xl font-extrabold text-[--color-neutral-900] leading-none">
                                    {{ $jml }}
                                </div>
                                <div class="text-caption">{{ $meta['label'] }}</div>
                                @if ($totalSetoran > 0)
                                    <div class="text-caption">{{ round(($jml / $totalSetoran) * 100) }}%</div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- Nilai non-huruf (misal angka) — hanya tampil kalau ada --}}
                    @if ($nilaiLainnya > 0)
                        <div
                            class="flex items-center gap-3 p-3 rounded-xl border border-[--color-neutral-100]
                                    bg-[--color-neutral-50] col-span-2">
                            <div class="grade-badge grade-neutral flex-shrink-0">#</div>
                            <div>
                                <div class="text-xl font-extrabold text-[--color-neutral-900] leading-none">
                                    {{ $nilaiLainnya }}
                                </div>
                                <div class="text-caption">Nilai lainnya (angka)</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== RIWAYAT SETORAN ===================== --}}
    <div class="card">
        <div class="card-header">
            <h2 class="h6 mb-0">Riwayat setoran</h2>
            <span class="text-caption">{{ $setorans->count() }} ditampilkan</span>
        </div>

        {{-- Tab filter tingkatan --}}
        <div class="card-body" style="padding-bottom: 0;">
            <div class="tabs-list-pills">
                <button type="button" wire:click="setFilter('')"
                    class="tab-btn-pill {{ $filterTingkatan === '' ? 'active' : '' }}">Semua</button>
                <button type="button" wire:click="setFilter('iqro')"
                    class="tab-btn-pill {{ $filterTingkatan === 'iqro' ? 'active' : '' }}">Iqro</button>
                <button type="button" wire:click="setFilter('juz_ama')"
                    class="tab-btn-pill {{ $filterTingkatan === 'juz_ama' ? 'active' : '' }}">Juz Amma</button>
                <button type="button" wire:click="setFilter('quran')"
                    class="tab-btn-pill {{ $filterTingkatan === 'quran' ? 'active' : '' }}">Al-Qur'an</button>
            </div>
        </div>

        @if ($setorans->isEmpty())
            <div class="empty-state">
                <div class="empty-state-title">Belum Ada Data</div>
                <p class="empty-state-desc">Belum ada riwayat setoran untuk filter ini.</p>
            </div>
        @else
            <div class="table-wrapper" style="border:none;border-radius:0;box-shadow:none;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Capaian</th>
                            <th>Jenis</th>
                            <th>Halaman</th>
                            <th>Nilai</th>
                            <th>Catatan</th>
                            <th>Ustadz</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setorans as $setoran)
                            <tr wire:key="riwayat-{{ $setoran->id }}">
                                <td class="text-caption whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($setoran->tanggal)->translatedFormat('d M Y') }}
                                    @if ($setoran->jam)
                                        <div class="text-[--color-neutral-400] text-xs">
                                            {{ \Illuminate\Support\Str::substr($setoran->jam, 0, 5) }}
                                        </div>
                                    @endif
                                </td>

                                {{-- Kolom Capaian — conditional sesuai tingkatan --}}
                                <td>
                                    @if ($setoran->tingkatan === 'iqro')
                                        <span class="badge badge-primary" style="margin-bottom:4px;">IQRO</span><br>
                                        <span class="font-semibold text-sm">Iqro {{ $setoran->iqro_awal }}</span>
                                        <span class="text-caption">(Hal {{ $setoran->halaman_iqro_awal }})</span>
                                        @if ($setoran->iqro_awal != $setoran->iqro_akhir || $setoran->halaman_iqro_awal != $setoran->halaman_iqro_akhir)
                                            <div class="text-caption">s/d Iqro {{ $setoran->iqro_akhir }} (Hal
                                                {{ $setoran->halaman_iqro_akhir }})</div>
                                        @endif
                                    @elseif($setoran->tingkatan === 'juz_ama')
                                        <span class="badge badge-primary" style="margin-bottom:4px;">JUZ
                                            AMMA</span><br>
                                        <span class="font-semibold text-sm">{{ $setoran->surah_awal }}</span>
                                        <span class="text-caption">(Ayat {{ $setoran->ayat_awal }})</span>
                                        @if ($setoran->surah_awal !== $setoran->surah_akhir || $setoran->ayat_awal != $setoran->ayat_akhir)
                                            <div class="text-caption">s/d {{ $setoran->surah_akhir }} (Ayat
                                                {{ $setoran->ayat_akhir }})</div>
                                        @endif
                                    @elseif($setoran->tingkatan === 'quran')
                                        <span class="badge badge-primary"
                                            style="margin-bottom:4px;">AL-QUR'AN</span><br>
                                        <span class="badge badge-juz" style="margin-bottom:4px;">JUZ
                                            {{ strtoupper($setoran->juz) }}</span><br>
                                        <span class="font-semibold text-sm">Halaman
                                            {{ $setoran->halaman_awal }}</span>
                                        @if ($setoran->halaman_awal != $setoran->halaman_akhir)
                                            <span class="text-caption">s/d {{ $setoran->halaman_akhir }}</span>
                                        @endif
                                    @endif
                                </td>

                                <td>
                                    @php
                                        $pillClass = match ($setoran->jenis) {
                                            'ziyadah' => 'pill-ziyadah',
                                            'murojaah' => 'pill-murojaah',
                                            'tadarus' => 'pill-tadarus',
                                            default => 'badge-neutral',
                                        };
                                    @endphp
                                    <span class="badge {{ $pillClass }}">{{ ucfirst($setoran->jenis) }}</span>
                                </td>

                                <td class="text-sm font-semibold text-[--color-neutral-700] whitespace-nowrap">
                                    {{ (float) $setoran->jumlah_halaman }} hal.
                                </td>

                                <td>
                                    @php
                                        $nilaiLower = strtolower((string) $setoran->nilai);
                                        $gradeClass = in_array($nilaiLower, ['a', 'b', 'c', 'd'])
                                            ? 'grade-' . $nilaiLower
                                            : 'grade-neutral';
                                    @endphp
                                    <span class="grade-badge {{ $gradeClass }}">
                                        {{ $setoran->nilai ?? '—' }}
                                    </span>
                                </td>

                                <td class="text-sm text-[--color-neutral-600] max-w-[160px]">
                                    @if ($setoran->catatan)
                                        <span class="truncate-2">{{ $setoran->catatan }}</span>
                                    @else
                                        <span class="text-[--color-neutral-300]">—</span>
                                    @endif
                                </td>

                                <td class="text-sm text-[--color-neutral-600] whitespace-nowrap">
                                    {{ $setoran->ustadz?->name ?? '—' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
