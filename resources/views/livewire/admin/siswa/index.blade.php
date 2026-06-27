<div style="padding: 2rem 1.5rem; max-width: 1280px; margin: 0 auto;">

    <div class="page-header">
        <div class="page-header-text">
            <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.25rem;">Manajemen</p>
            <h1 class="page-title">Data Siswa</h1>
            <p class="page-subtitle">{{ $siswas->total() }} santri terdaftar dalam sistem</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.siswa.create') }}" wire:navigate class="btn btn-primary btn-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Tambah Siswa
            </a>
        </div>
    </div>

    {{-- Filter & Search Bar --}}
    <div class="card card-flat" style="margin-bottom: 1.5rem;">
        <div class="card-body" style="padding: 1rem 1.25rem;">
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; align-items: center;">
                {{-- Search --}}
                <div class="input-wrapper input-icon-left" style="flex: 1; min-width: 220px;">
                    <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <input wire:model.live.debounce.300ms="search" type="text" class="form-input form-input-sm"
                        placeholder="Cari nama, NIS, atau kelas…" />
                </div>

                {{-- Status Filter --}}
                <select wire:model.live="statusFilter" class="form-select form-input-sm"
                    style="width: auto; min-width: 140px;">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="alumni">Alumni</option>
                </select>

                {{-- Clear filter --}}
                @if ($search || $statusFilter)
                    <button wire:click="$set('search', ''); $set('statusFilter', '')" class="btn btn-ghost btn-sm"
                        style="color: var(--color-danger-500);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        Reset
                    </button>
                @endif
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 40px;">#</th>
                    <th>Nama Santri</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Tgl. Masuk</th>
                    <th>Kode Akses</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                    <tr>
                        <td class="text-caption" style="font-weight: 700; color: var(--color-neutral-400);">
                            {{ $loop->iteration + ($siswas->currentPage() - 1) * $siswas->perPage() }}
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.75rem;">

                                <div>
                                    <p style="font-weight: 700; color: var(--color-neutral-900); font-size: 0.875rem;">
                                        {{ $siswa->nama }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="info-chip" style="font-size: 0.75rem;">{{ $siswa->nis }}</span>
                        </td>
                        <td style="font-weight: 600; font-size: 0.875rem;">{{ $siswa->kelas }}</td>
                        <td class="text-caption" style="font-weight: 600;">
                            {{ $siswa->tanggal_masuk->format('d M Y') }}
                        </td>
                        <td>
                            <code
                                style="
                                        background: var(--color-neutral-100);
                                        border: 1px solid var(--color-neutral-200);
                                        border-radius: var(--radius-sm);
                                        padding: 0.2rem 0.5rem;
                                        font-size: 0.8125rem;
                                        font-weight: 700;
                                        letter-spacing: 0.1em;
                                        color: var(--color-neutral-700);
                                        font-family: monospace;
                                    ">{{ $siswa->kode_akses }}</code>
                        </td>
                        <td>
                            @if ($siswa->status === 'aktif')
                                <span class="badge badge-success badge-dot">Aktif</span>
                            @else
                                <span class="badge badge-neutral badge-dot">Alumni</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 0.375rem;">
                                {{-- Detail --}}
                                <a href="{{ route('admin.siswa.show', $siswa) }}" wire:navigate title="Lihat Detail"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:50%; color:var(--color-neutral-600); background:transparent; border:none; text-decoration:none; transition:background 0.15s, color 0.15s; flex-shrink:0;"
                                    onmouseover="this.style.background='var(--color-neutral-100)';this.style.color='var(--color-neutral-900)'"
                                    onmouseout="this.style.background='transparent';this.style.color='var(--color-neutral-600)'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.siswa.edit', $siswa) }}" wire:navigate title="Edit"
                                    style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:50%; color:var(--color-neutral-600); background:transparent; border:none; text-decoration:none; transition:background 0.15s, color 0.15s; flex-shrink:0;"
                                    onmouseover="this.style.background='var(--color-neutral-100)';this.style.color='var(--color-neutral-900)'"
                                    onmouseout="this.style.background='transparent';this.style.color='var(--color-neutral-600)'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                <div x-data="{ open: false }">
                                    <button @click="open = true" title="Hapus"
                                        style="display:inline-flex; align-items:center; justify-content:center; width:32px; height:32px; border-radius:50%; color:var(--color-danger-500); background:transparent; border:none; cursor:pointer; transition:background 0.15s; flex-shrink:0;"
                                        onmouseover="this.style.background='var(--color-danger-50)'"
                                        onmouseout="this.style.background='transparent'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                    </button>

                                    {{-- Confirm Modal --}}
                                    <div x-show="open" x-cloak class="modal-backdrop" @click.self="open = false"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                        <div class="modal modal-sm"
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100">
                                            <div class="modal-body" style="padding: 2rem 1.5rem; text-align: center;">
                                                <div
                                                    style="
                                                            width: 56px; height: 56px;
                                                            background: var(--color-danger-50);
                                                            border-radius: 50%;
                                                            display: flex; align-items: center; justify-content: center;
                                                            margin: 0 auto 1rem;
                                                            color: var(--color-danger-500);
                                                        ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path
                                                            d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                                                        <path d="M12 9v4" />
                                                        <path d="M12 17h.01" />
                                                    </svg>
                                                </div>
                                                <h4
                                                    style="font-weight: 800; text-transform: uppercase; margin-bottom: 0.5rem;">
                                                    Hapus Siswa?</h4>
                                                <p
                                                    style="font-size: 0.875rem; color: var(--color-neutral-600); margin-bottom: 1.5rem; line-height: 1.6;">
                                                    Data <strong>{{ $siswa->nama }}</strong> dan seluruh riwayat
                                                    setorannya akan dihapus permanen.
                                                </p>
                                                <div style="display: flex; gap: 0.625rem; justify-content: center;">
                                                    <button @click="open = false"
                                                        class="btn btn-secondary btn-sm">Batal</button>
                                                    <button wire:click="deleteSiswa({{ $siswa->id }})"
                                                        @click="open = false" class="btn btn-danger btn-sm">
                                                        Ya, Hapus
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                </div>
                                <p class="empty-state-title">Tidak Ada Data</p>
                                <p class="empty-state-desc">
                                    @if ($search || $statusFilter)
                                        Tidak ditemukan siswa yang cocok dengan filter. Coba ubah kata kunci pencarian.
                                    @else
                                        Belum ada siswa terdaftar. Tambahkan siswa pertama sekarang.
                                    @endif
                                </p>
                                @if (!$search && !$statusFilter)
                                    <a href="{{ route('admin.siswa.create') }}" wire:navigate
                                        class="btn btn-primary btn-sm" style="margin-top: 0.5rem;">
                                        + Tambah Siswa
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($siswas->hasPages())
        <div
            style="margin-top: 1.25rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.75rem;">
            <p style="font-size: 0.8125rem; color: var(--color-neutral-500); font-weight: 600;">
                Menampilkan {{ $siswas->firstItem() }}–{{ $siswas->lastItem() }} dari {{ $siswas->total() }} siswa
            </p>
            <div class="pagination">
                {{ $siswas->links() }}
            </div>
        </div>
    @endif

</div>
