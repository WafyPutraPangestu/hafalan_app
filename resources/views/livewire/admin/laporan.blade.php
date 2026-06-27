<div style="padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto;">
    <!-- CSS Khusus untuk Print (Hanya aktif saat Ctrl+P atau tombol Print ditekan) -->
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
        }

        .print-header {
            display: none;
        }

        /* Sembunyikan di layar normal */
    </style>

    <!-- Header Laporan Cetak (Hanya Muncul saat Print) -->
    <div class="print-header">
        <h1 style="font-size: 1.5rem; font-weight: 800; text-transform: uppercase;">Laporan Setoran Hafalan Santri</h1>
        <p>Periode: <strong>{{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}</strong> s/d
            <strong>{{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</strong>
        </p>
        @if ($siswa_id)
            <p>Nama Santri: <strong>{{ $searchSiswa }}</strong></p>
        @endif
        <hr style="border-top: 2px solid #000; margin-top: 1rem;">
    </div>

    <!-- Header Halaman Normal -->
    <div class="page-header no-print">
        <div class="page-header-text">
            <h1 class="page-title">Laporan Data Setoran</h1>
            <p class="page-subtitle">Filter dan cetak rekapan <span class="text-highlight">progres hafalan</span>.</p>
        </div>
        <div class="page-header-actions">
            <!-- Tombol Print JavaScript -->
            <button onclick="window.print()" class="btn btn-primary">
                🖨️ CETAK LAPORAN
            </button>
        </div>
    </div>

    <!-- KOTAK FILTER (Akan disembunyikan saat print) -->
    <div class="card no-print" style="margin-bottom: 1.5rem; background: var(--color-neutral-50);">
        <div class="card-body"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; align-items: end;">

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
                </select>
            </div>

            <!-- Search Santri dengan Alpine JS -->
            <div class="form-group" style="position: relative;" x-data="{ dropdownOpen: false }">
                <label class="form-label">Filter Santri</label>
                <div @click.away="dropdownOpen = false" style="position: relative;">
                    <input type="text" wire:model.live.debounce.300ms="searchSiswa" @focus="dropdownOpen = true"
                        class="form-input" placeholder="Semua Santri (Ketik nama...)" autocomplete="off"
                        {{ $siswa_id ? 'readonly' : '' }}>

                    <!-- Tombol Silang (Clear) jika siswa sudah dipilih -->
                    @if ($siswa_id)
                        <button type="button" wire:click="clearSiswa"
                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: none; background: transparent; cursor: pointer; color: var(--color-danger-500); font-weight: bold;">✕</button>
                    @endif

                    <!-- Dropdown List -->
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

    <!-- KARTU RINGKASAN STATISTIK (Ikut tercetak) -->
    <div class="grid-stats" style="margin-bottom: 1.5rem;">
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
    </div>

    <!-- TABEL DATA LAPORAN -->
    <div class="card">
        <div class="table-wrapper" style="border-radius: 0; border: none; box-shadow: none;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Santri & Kelas</th>
                        <th>Jenis</th>
                        <th>Surah Awal - Akhir</th>
                        <th>Halaman</th>
                        <th>Nilai</th>
                        <th>Penilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($setorans as $setoran)
                        <tr>
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
                                <span
                                    class="badge {{ $setoran->jenis === 'ziyadah' ? 'pill-ziyadah' : 'pill-murojaah' }}">
                                    {{ $setoran->jenis }}
                                </span>
                            </td>
                            <td>
                                <strong>{{ $setoran->surah_awal }}</strong> ({{ $setoran->ayat_awal }})<br>
                                <span class="text-caption">s/d <strong>{{ $setoran->surah_akhir }}</strong>
                                    ({{ $setoran->ayat_akhir }})
                                </span>
                            </td>
                            <td><strong>{{ $setoran->jumlah_halaman }}</strong> Hal</td>
                            <td>
                                <span class="grade-badge grade-{{ strtolower($setoran->nilai) }}">
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
                                    <p class="empty-state-desc">Tidak ada data setoran pada filter periode/santri yang
                                        dipilih.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginasi disembunyikan saat print -->
        @if ($setorans->hasPages())
            <div class="card-footer no-print">
                {{ $setorans->links() }}
            </div>
        @endif
    </div>
</div>
