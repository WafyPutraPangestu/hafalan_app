<div style="padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto;">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Assalamu'alaikum, {{ auth()->user()->name }}!</h1>
            <p class="page-subtitle">Berikut adalah ringkasan <span class="text-highlight">progres hafalan</span> santri
                hari ini.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.setoran.create') }}" wire:navigate class="btn btn-primary">
                + INPUT SETORAN
            </a>
        </div>
    </div>

    <div class="grid-stats" style="margin-bottom: 1.5rem;">
        <div class="card-stat">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <div class="card-stat-label">Santri Aktif</div>
                    <div class="card-stat-value">{{ $totalSantri }}</div>
                </div>
                <div class="card-stat-icon">👥</div>
            </div>
            <div class="card-stat-sub">Total santri yang menempuh hafalan.</div>
        </div>

        <div class="card-stat">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <div class="card-stat-label">Setoran Hari Ini</div>
                    <div class="card-stat-value">{{ $setoranHariIni }}</div>
                </div>
                <div class="card-stat-icon"
                    style="background: var(--color-success-50); color: var(--color-success-600);">📝</div>
            </div>
            <div class="card-stat-sub">Sesi setoran yang terekam hari ini.</div>
        </div>

        <div class="card-stat">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <div class="card-stat-label">Total Bulan Ini</div>
                    <div class="card-stat-value">{{ $setoranBulanIni }}</div>
                </div>
                <div class="card-stat-icon"
                    style="background: var(--color-warning-50); color: var(--color-warning-600);">📅</div>
            </div>
            <div class="card-stat-sub">Total setoran sepanjang bulan berjalan.</div>
        </div>

        <div class="card-stat"
            style="background: var(--color-primary-100); border-color: var(--color-primary-300); justify-content: center; align-items: center; gap: 0.5rem; cursor: pointer;"
            onclick="window.Livewire.navigate('{{ route('admin.siswa.create') }}')">
            <div class="avatar avatar-md"
                style="background: var(--color-neutral-900); color: var(--color-primary-400);">+</div>
            <div
                style="font-weight: 800; color: var(--color-neutral-900); text-transform: uppercase; font-size: 0.875rem;">
                Tambah Santri</div>
        </div>
    </div>
    <!-- ============================================== -->
    <!-- AREA GRAFIK / CHART (Sudah Diperbaiki)         -->
    <!-- ============================================== -->
    <div
        style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 1.5rem; @media(min-width: 1024px){ grid-template-columns: 2fr 1fr; }">

        <!-- CHART 1: Tren Setoran (Area Chart) -->
        <div class="card" x-data="{
            init() {
                let options = {
                    series: [{
                        name: 'Setoran',
                        data: {{ $chartTrenData }}
                    }],
                    chart: {
                        type: 'area',
                        height: 300,
                        toolbar: { show: false },
                        fontFamily: 'var(--font-sans)',
                        zoom: { enabled: false }
                    },
                    colors: ['#a3e635'],
                    fill: {
                        type: 'gradient',
                        gradient: { shadeIntensity: 1, opacityFrom: 0.45, opacityTo: 0.05, stops: [50, 100] }
                    },
                    dataLabels: { enabled: false },
                    stroke: { curve: 'smooth', width: 3, colors: ['#65a30d'] },
                    xaxis: {
        
                        categories: {{ $chartTrenDates }},
                        axisBorder: { show: false },
                        axisTicks: { show: false },
                        labels: { style: { colors: '#a1a1aa', fontWeight: 600 } }
                    },
                    yaxis: {
                        labels: { style: { colors: '#a1a1aa', fontWeight: 600 } }
                    },
                    grid: { borderColor: '#e4e4e7', strokeDashArray: 4 }
                };
                let chart = new ApexCharts(this.$refs.chartTren, options);
                chart.render();
            }
        }">
            <div class="card-header">
                <h3 class="h5">Tren Setoran 7 Hari Terakhir</h3>
            </div>
            <div class="card-body">
                <div x-ref="chartTren"></div>
            </div>
        </div>

        <!-- CHART 2: Komposisi Jenis (Donut Chart) -->
        <div class="card" x-data="{
            init() {
                let options = {
                    series: {{ $chartJenisData }},
                    labels: ['Ziyadah', 'Murojaah'],
                    chart: {
                        type: 'donut',
                        height: 300,
                        fontFamily: 'var(--font-sans)'
                    },
                    colors: ['#a3e635', '#27272a'],
                    plotOptions: {
                        pie: {
                            donut: { size: '75%', labels: { show: true, name: { show: true }, value: { show: true, fontSize: '1.5rem', fontWeight: 800, color: '#09090b' }, total: { show: true, showAlways: true, label: 'Total', fontSize: '0.875rem', fontWeight: 700, color: '#71717a' } } }
                        }
                    },
                    dataLabels: { enabled: false },
                    stroke: { show: false },
                    legend: { position: 'bottom', fontWeight: 700, markers: { radius: 12 } }
                };
                let chart = new ApexCharts(this.$refs.chartJenis, options);
                chart.render();
            }
        }">
            <div class="card-header">
                <h3 class="h5">Komposisi Hafalan Bulan Ini</h3>
            </div>
            <div class="card-body"
                style="display: flex; justify-content: center; align-items: center; padding-top: 2rem;">
                <div x-ref="chartJenis" style="width: 100%;"></div>
            </div>
        </div>
    </div>
    <div
        style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; @media(min-width: 1024px){ grid-template-columns: 2fr 1fr; }">

        <div class="card">
            <div class="card-header">
                <h3 class="h5">Riwayat Setoran Terbaru</h3>
                <a href="{{ route('admin.setoran.index') }}" wire:navigate
                    style="font-size: 0.8125rem; font-weight: 700; color: var(--color-primary-600); text-decoration: none;">LIHAT
                    SEMUA &rarr;</a>
            </div>
            <div class="table-wrapper" style="border-radius: 0; border: none; box-shadow: none;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Santri</th>
                            <th>Surah & Ayat</th>
                            <th>Nilai</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentSetorans as $setoran)
                            <tr>
                                <td>
                                    <strong
                                        style="color: var(--color-neutral-900);">{{ $setoran->siswa->nama }}</strong><br>
                                    <span
                                        class="badge {{ $setoran->jenis === 'ziyadah' ? 'pill-ziyadah' : 'pill-murojaah' }}"
                                        style="margin-top: 0.25rem;">
                                        {{ $setoran->jenis }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ $setoran->surah_awal }}</strong> ({{ $setoran->ayat_awal }})<br>
                                    <span class="text-caption">s/d <strong>{{ $setoran->surah_akhir }}</strong>
                                        ({{ $setoran->ayat_akhir }})
                                    </span>
                                </td>
                                <td>
                                    <span class="grade-badge grade-{{ strtolower($setoran->nilai) }}">
                                        {{ $setoran->nilai }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ \Carbon\Carbon::parse($setoran->tanggal)->format('d M') }}</strong><br>
                                    <span
                                        class="text-caption">{{ \Carbon\Carbon::parse($setoran->jam)->format('H:i') }}
                                        WIB</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <div class="empty-state-title">Belum Ada Setoran</div>
                                        <p class="empty-state-desc">Belum ada rekapan setoran yang diinput hari ini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h5">Santri Teraktif Bulan Ini</h3>
            </div>
            <div class="card-body" style="display: flex; flex-direction: column; gap: 1rem;">
                @forelse($topSantris as $index => $santri)
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <div class="avatar avatar-md"
                            style="background: {{ $index === 0 ? 'var(--color-gold-400)' : 'var(--color-neutral-200)' }}; color: var(--color-neutral-900);">
                            {{ $index + 1 }}
                        </div>
                        <div style="flex: 1;">
                            <a href="{{ route('admin.siswa.show', $santri->id) }}" wire:navigate
                                style="font-weight: 700; color: var(--color-neutral-900); text-decoration: none;">
                                {{ $santri->nama }}
                            </a>
                            <div style="font-size: 0.75rem; color: var(--color-neutral-500);">Kelas:
                                {{ $santri->kelas }}</div>
                        </div>
                        <div style="text-align: right;">
                            <strong
                                style="color: var(--color-primary-600); font-size: 1.125rem;">{{ $santri->setorans_count }}</strong>
                            <div
                                style="font-size: 0.6875rem; font-weight: 700; color: var(--color-neutral-400); text-transform: uppercase;">
                                Setoran</div>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <div class="sidebar-divider" style="margin: 0.25rem 0;"></div>
                    @endif
                @empty
                    <div
                        style="text-align: center; color: var(--color-neutral-500); font-size: 0.875rem; padding: 1rem 0;">
                        Belum ada data setoran bulan ini.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
