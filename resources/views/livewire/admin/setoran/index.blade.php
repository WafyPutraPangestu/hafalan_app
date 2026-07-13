<div>
    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Data Setoran</h1>
            <p class="page-subtitle">Riwayat setoran hafalan seluruh santri.</p>
        </div>
        <div class="page-header-actions">
            @can('ustadz')
                <a href="{{ route('admin.setoran.create') }}" wire:navigate class="btn btn-primary btn-md">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Setoran Baru
                </a>
            @endcan
        </div>
    </div>

    {{-- Filter Bar --}}
    <div class="card card-flat mb-5">
        <div class="card-body">
            <div class="form-row form-row-3">
                <div class="form-group">
                    <label class="form-label">Cari Santri</label>
                    <div class="input-wrapper input-icon-left">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="11" cy="11" r="7" />
                            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                        </svg>
                        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Ketik nama santri..."
                            class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis</label>
                    <select wire:model.live="jenisFilter" class="form-select">
                        <option value="">Semua Jenis</option>
                        <option value="ziyadah">Ziyadah</option>
                        <option value="murojaah">Murojaah</option>
                        <option value="tadarus">Tadarus</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Tingkatan</label>
                    <select wire:model.live="tingkatanFilter" class="form-select">
                        <option value="">Semua Tingkatan</option>
                        <option value="iqro">Iqro</option>
                        <option value="juz_ama">Juz Amma</option>
                        <option value="quran">Al-Qur'an</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    @if ($setorans->isEmpty())
        <div class="card">
            <div class="empty-state">
                <div class="empty-state-icon">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="empty-state-title">Belum Ada Data</h3>
                <p class="empty-state-desc">
                    @if ($search || $jenisFilter || $tingkatanFilter)
                        Tidak ada setoran yang cocok dengan filter kamu. Coba ubah pencarian atau filter.
                    @else
                        Belum ada setoran yang tercatat. Mulai dengan menambahkan setoran baru.
                    @endif
                </p>
                @unless ($search || $jenisFilter || $tingkatanFilter)
                    <a href="{{ route('admin.setoran.create') }}" wire:navigate class="btn btn-primary btn-sm mt-2">
                        Tambah Setoran
                    </a>
                @endunless
            </div>
        </div>
    @else
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Santri</th>
                        <th>Tanggal &amp; Jam</th>
                        <th>Jenis</th>
                        <th>Materi</th>
                        <th>Jml Halaman</th>
                        <th>Nilai</th>
                        <th>Ustadz</th>
                        @can('admin')
                            <th class="text-right">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setorans as $item)
                        <tr wire:key="setoran-{{ $item->id }}">
                            <td>
                                <div class="flex items-center gap-2">
                                    <div class="avatar avatar-sm">
                                        {{ strtoupper(substr($item->siswa->nama, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold">{{ $item->siswa->nama }}</span>
                                </div>
                            </td>

                            <td>
                                <div>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</div>
                                <div class="text-caption">{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</div>
                            </td>

                            <td>
                                <span
                                    class="badge {{ match ($item->jenis) {
                                        'ziyadah' => 'pill-ziyadah',
                                        'murojaah' => 'pill-murojaah',
                                        'tadarus' => 'pill-tadarus',
                                    } }}">
                                    {{ ucfirst($item->jenis) }}
                                </span>
                            </td>

                            <td>
                                <span class="badge-juz mr-1">
                                    @if ($item->tingkatan === 'iqro')
                                        Iqro
                                    @elseif ($item->tingkatan === 'juz_ama')
                                        Juz Amma
                                    @elseif ($item->tingkatan === 'quran')
                                        Qur'an
                                    @endif
                                </span>
                                <div class="text-caption mt-1">
                                    @if ($item->tingkatan === 'iqro')
                                        Iqro {{ $item->iqro_awal }} Hal
                                        {{ $item->halaman_iqro_awal }}:{{ $item->ayat_iqro_awal }}
                                        &rarr;
                                        Iqro {{ $item->iqro_akhir }} Hal
                                        {{ $item->halaman_iqro_akhir }}:{{ $item->ayat_iqro_akhir }}
                                    @elseif ($item->tingkatan === 'juz_ama')
                                        {{ $item->surah_awal }}:{{ $item->ayat_awal }}
                                        &rarr;
                                        {{ $item->surah_akhir }}:{{ $item->ayat_akhir }}
                                    @elseif ($item->tingkatan === 'quran')
                                        {{ $item->juz }} &middot; Hal
                                        {{ $item->halaman_awal }}–{{ $item->halaman_akhir }}
                                    @endif
                                </div>
                            </td>

                            <td>{{ number_format($item->jumlah_halaman, 1) }} hal</td>

                            <td>
                                @if (in_array(strtoupper($item->nilai), ['A', 'B', 'C', 'D']))
                                    <span class="grade-badge grade-{{ strtolower($item->nilai) }}">
                                        {{ strtoupper($item->nilai) }}
                                    </span>
                                @else
                                    <span class="badge badge-neutral">{{ $item->nilai }}</span>
                                @endif
                            </td>

                            <td>{{ $item->ustadz->name }}</td>
                            @can('admin')
                                <td class="text-left">
                                    <div class="dropdown" x-data="{ open: false, top: 0, left: 0 }">
                                        <button type="button" x-ref="trigger" title="Aksi lainnya"
                                            aria-label="Aksi lainnya" :class="{ 'is-open': open }" class="action-trigger"
                                            @click="
                open = !open;
                if (open) {
                    const rect = $refs.trigger.getBoundingClientRect();
                    top = rect.bottom + 6;
                    left = rect.right - 200;
                }
            "
                                            @click.outside="open = false">
                                            <svg viewBox="0 0 24 24" style="width:16px; height:16px;" fill="currentColor">
                                                <circle cx="12" cy="6" r="1.6" />
                                                <circle cx="12" cy="12" r="1.6" />
                                                <circle cx="12" cy="18" r="1.6" />
                                            </svg>
                                        </button>

                                        <div x-show="open" x-cloak @click.outside="open = false"
                                            :style="`position: fixed; top: ${top}px; left: ${left}px; z-index: 70;`"
                                            class="dropdown-menu">
                                            <a href="{{ route('admin.setoran.edit', $item->id) }}" wire:navigate
                                                class="dropdown-item">
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 16l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                                Edit Data
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <button wire:click="deleteSetoran({{ $item->id }})"
                                                wire:confirm="Yakin ingin menghapus setoran ini? Data tidak bisa dikembalikan."
                                                class="dropdown-item danger">
                                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $setorans->links() }}
        </div>
    @endif
</div>
