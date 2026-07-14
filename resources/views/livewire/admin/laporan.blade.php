<div class="container-app" style="padding-top: 2rem; padding-bottom: 2rem;">
    <style>
        @media print {
            body {
                background: white !important;
            }

            .navbar,
            .sidebar,
            .no-print,
            .pagination {
                display: none !important;
            }

            .layout-content {
                margin-left: 0 !important;
                padding: 0 !important;
                max-width: 100% !important;
            }

            .card {
                box-shadow: none !important;
                border: 1px solid #000 !important;
                break-inside: avoid;
            }

            .print-header {
                display: block !important;
                text-align: center;
                margin-bottom: 2rem;
            }

            .table th {
                background: #f4f4f5 !important;
                -webkit-print-color-adjust: exact;
            }

            .badge,
            .grade-badge {
                border: 1px solid #000 !important;
                color: #000 !important;
                background: transparent !important;
            }
        }

        .print-header {
            display: none;
        }
    </style>

    <div class="print-header">
        <h1 style="font-size: 1.5rem; font-weight: 800; text-transform: uppercase;">Laporan Setoran Santri</h1>
        <p>Periode: <strong>{{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}</strong> s/d
            <strong>{{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</strong>
        </p>
        @if ($siswa_id)
            <p>Nama Santri: <strong>{{ $searchSiswa }}</strong></p>
        @endif
        <hr style="border-top: 2px solid #000; margin-top: 1rem;">
    </div>

    <div class="page-header no-print">
        <div class="page-header-text">
            <h1 class="page-title">Laporan Data Setoran</h1>
            <p class="page-subtitle">Filter dan cetak rekapan <span class="text-highlight">progres hafalan</span>.</p>
        </div>
        <div class="page-header-actions">
            <button onclick="window.print()" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                CETAK LAPORAN
            </button>
        </div>
    </div>

    <div class="card no-print" style="margin-bottom: 1.5rem; background: var(--color-neutral-50);">
        <div class="card-body"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; align-items: end;">
            <div class="form-group">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" wire:model.live="startDate" class="form-input">
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal Akhir</label>
                <input type="date" wire:model.live="endDate" class="form-input">
            </div>
            <div class="form-group">
                <label class="form-label">Jenis Setoran</label>
                <select wire:model.live="jenis" class="form-select">
                    <option value="">Semua Jenis</option>
                    <option value="ziyadah">Ziyadah</option>
                    <option value="murojaah">Murojaah</option>
                    <option value="tadarus">Tadarus</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Tingkatan</label>
                <select wire:model.live="tingkatan" class="form-select">
                    <option value="">Semua Tingkatan</option>
                    <option value="iqro">Iqro</option>
                    <option value="juz_ama">Juz Amma</option>
                    <option value="quran">Al-Qur'an</option>
                </select>
            </div>

            <div class="form-group" style="position: relative;" x-data="{ dropdownOpen: false }">
                <label class="form-label">Filter Santri</label>
                <div @click.away="dropdownOpen = false" style="position: relative;">
                    <input type="text" wire:model.live.debounce.300ms="searchSiswa" @focus="dropdownOpen = true"
                        class="form-input" placeholder="Ketik nama..." autocomplete="off"
                        {{ $siswa_id ? 'readonly' : '' }}>

                    @if ($siswa_id)
                        <button type="button" wire:click="clearSiswa"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: transparent; cursor: pointer; color: var(--color-danger-500); font-weight: bold;">✕</button>
                    @endif

                    <div x-show="dropdownOpen && $wire.searchSiswa.length > 0 && !$wire.siswa_id" x-transition
                        class="dropdown-menu"
                        style="width: 100%; top: calc(100% + 4px); max-height: 250px; overflow-y: auto; padding: 0.5rem;"
                        x-cloak>
                        @forelse($siswas as $s)
                            <button type="button"
                                @click="$wire.selectSiswa({{ $s->id }}, '{{ addslashes($s->nama) }}'); dropdownOpen = false;"
                                class="dropdown-item">
                                <strong>{{ $s->nama }}</strong> <span
                                    class="text-caption">({{ $s->kelas }})</span>
                            </button>
                        @empty
                            <div
                                style="padding: 0.5rem; text-align: center; color: var(--color-neutral-500); font-size: 0.8125rem;">
                                Tidak ditemukan.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
        <div class="card-stat">
            <div class="card-stat-label">Total Sesi Setoran</div>
            <div class="card-stat-value" style="color: var(--color-primary-600);">{{ $totalSetoran }}</div>
        </div>
        <div class="card-stat">
            <div class="card-stat-label">Total Halaman</div>
            <div class="card-stat-value">{{ number_format($totalHalaman, 1, ',', '.') }}</div>
        </div>
        <div class="card-stat">
            <div class="card-stat-label">Ziyadah (Baru)</div>
            <div class="card-stat-value">{{ $totalZiyadah }}</div>
        </div>
        <div class="card-stat">
            <div class="card-stat-label">Murojaah (Ulang)</div>
            <div class="card-stat-value">{{ $totalMurojaah }}</div>
        </div>
        <div class="card-stat">
            <div class="card-stat-label">Tadarus</div>
            <div class="card-stat-value">{{ $totalTadarus }}</div>
        </div>
    </div>

    <div class="card">
        <div class="table-wrapper" style="border-radius: 0; border: none; box-shadow: none;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal & Waktu</th>
                        <th>Santri & Kelas</th>
                        <th>Jenis</th>
                        <th>Capaian Hafalan / Bacaan</th>
                        <th>Halaman</th>
                        <th>Nilai</th>
                        <th>Penilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($setorans as $setoran)
                        <tr wire:key="setoran-{{ $setoran->id }}">
                            <td>
                                <strong>{{ \Carbon\Carbon::parse($setoran->tanggal)->format('d/m/Y') }}</strong><br>
                                <span class="text-caption">{{ \Carbon\Carbon::parse($setoran->jam)->format('H:i') }}
                                    WIB</span>
                            </td>
                            <td>
                                <strong
                                    style="color: var(--color-neutral-900);">{{ $setoran->siswa->nama }}</strong><br>
                                <span class="text-caption">{{ $setoran->siswa->kelas }}</span>
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
                            <td>
                                @if ($setoran->tingkatan === 'iqro')
                                    <span class="badge badge-primary" style="margin-bottom:4px;">IQRO</span><br>
                                    <strong>Iqro {{ $setoran->iqro_awal }}</strong> (Hal
                                    {{ $setoran->halaman_iqro_awal }})
                                    @if ($setoran->iqro_awal != $setoran->iqro_akhir || $setoran->halaman_iqro_awal != $setoran->halaman_iqro_akhir)
                                        <br><span class="text-caption">s/d</span> <strong>Iqro
                                            {{ $setoran->iqro_akhir }}</strong> (Hal
                                        {{ $setoran->halaman_iqro_akhir }})
                                    @endif
                                @elseif($setoran->tingkatan === 'juz_ama')
                                    <span class="badge badge-primary" style="margin-bottom:4px;">JUZ AMMA</span><br>
                                    <strong>{{ $setoran->surah_awal }}</strong> (Ayat {{ $setoran->ayat_awal }})
                                    @if ($setoran->surah_awal != $setoran->surah_akhir || $setoran->ayat_awal != $setoran->ayat_akhir)
                                        <br><span class="text-caption">s/d</span>
                                        <strong>{{ $setoran->surah_akhir }}</strong> (Ayat {{ $setoran->ayat_akhir }})
                                    @endif
                                @elseif($setoran->tingkatan === 'quran')
                                    <span class="badge badge-primary" style="margin-bottom:4px;">AL-QUR'AN</span><br>
                                    <span class="badge badge-juz" style="margin-bottom:4px;">JUZ
                                        {{ strtoupper($setoran->juz) }}</span><br>
                                    Halaman <strong>{{ $setoran->halaman_awal }}</strong>
                                    @if ($setoran->halaman_awal != $setoran->halaman_akhir)
                                        <span class="text-caption">s/d</span>
                                        <strong>{{ $setoran->halaman_akhir }}</strong>
                                    @endif
                                @endif
                            </td>
                            <td><strong>{{ (float) $setoran->jumlah_halaman }}</strong> Hal</td>
                            <td>
                                @php
                                    // Nilai bisa berupa huruf (A/B/C/D) atau angka (misal 85).
                                    // Class grade-badge hanya tersedia untuk huruf, jadi angka
                                    // atau nilai lain di luar A-D fallback ke style netral.
                                    $nilaiLower = strtolower((string) $setoran->nilai);
                                    $gradeClass = in_array($nilaiLower, ['a', 'b', 'c', 'd'])
                                        ? 'grade-' . $nilaiLower
                                        : 'grade-neutral';
                                @endphp
                                <span class="grade-badge {{ $gradeClass }}">
                                    {{ $setoran->nilai }}
                                </span>
                            </td>
                            <td class="text-caption">{{ $setoran->ustadz->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state no-print">
                                    <div class="empty-state-title">Data Kosong</div>
                                    <p class="empty-state-desc">Tidak ada data setoran pada filter yang dipilih.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($setorans->hasPages())
            <div class="card-footer no-print">
                {{ $setorans->links() }}
            </div>
        @endif
    </div>
</div>
