<div>
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Manajemen Akun</h1>
            <p class="page-subtitle">Kelola akun admin dan ustadz yang bisa mengakses sistem.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.ustadz.create') }}" wire:navigate class="btn btn-primary btn-md">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Akun
            </a>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div class="card card-flat mb-5">
        <div class="card-body">
            <div class="form-row form-row-2">
                <div class="form-group">
                    <label class="form-label">Cari Nama / Email</label>
                    <div class="input-wrapper input-icon-left">
                        <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="11" cy="11" r="7" />
                            <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                        </svg>
                        <input type="text" wire:model.live.debounce.400ms="search"
                            placeholder="Ketik nama atau email..." class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Peran</label>
                    <select wire:model.live="roleFilter" class="form-select">
                        <option value="">Semua Peran</option>
                        <option value="admin">Admin</option>
                        <option value="ustadz">Ustadz</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    @if ($users->isEmpty())
        <div class="card">
            <div class="empty-state">
                <div class="empty-state-icon">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm7 4h6m-3-3v6" />
                    </svg>
                </div>
                <h3 class="empty-state-title">Belum Ada Akun</h3>
                <p class="empty-state-desc">
                    @if ($search || $roleFilter)
                        Tidak ada akun yang cocok dengan filter kamu.
                    @else
                        Belum ada akun ustadz yang terdaftar. Mulai dengan menambahkan akun baru.
                    @endif
                </p>
                @unless ($search || $roleFilter)
                    <a href="{{ route('admin.ustadz.create') }}" wire:navigate class="btn btn-primary btn-sm mt-2">
                        Tambah Akun
                    </a>
                @endunless
            </div>
        </div>
    @else
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                        <th>Bergabung</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr wire:key="user-{{ $item->id }}">
                            <td>
                                <div class="flex items-center gap-2">
                                    <div
                                        class="avatar avatar-sm {{ $item->isAdmin() ? '' : 'bg-[--color-neutral-200]' }}">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </div>
                                    <span class="font-semibold">{{ $item->name }}</span>
                                    @if ($item->id === auth()->id())
                                        <span class="badge badge-neutral">Kamu</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-[--color-neutral-600]">{{ $item->email }}</td>
                            <td>
                                <span class="badge {{ $item->isAdmin() ? 'badge-gold' : 'badge-info' }}">
                                    {{ $item->role->label() }}
                                </span>
                            </td>
                            <td class="text-[--color-neutral-500]">
                                {{ $item->created_at->translatedFormat('d M Y') }}
                            </td>
                            <td class="text-right">
                                <div class="dropdown" x-data="{
                                    open: false,
                                    top: 0,
                                    left: 0,
                                    toggle() {
                                        this.open = !this.open;
                                        if (!this.open) return;
                                
                                        this.$nextTick(() => {
                                            const trigger = this.$refs.trigger;
                                            const menu = this.$refs.menu;
                                            const rect = trigger.getBoundingClientRect();
                                            const menuRect = menu.getBoundingClientRect();
                                
                                            const gap = 6;
                                            const edgePadding = 12;
                                            const safeBottom = 24; // buffer ekstra buat home-indicator HP
                                
                                            // Vertikal: default buka ke bawah, kalau ruang kurang buka ke atas
                                            const spaceBelow = window.innerHeight - rect.bottom - safeBottom;
                                            if (spaceBelow >= menuRect.height + gap) {
                                                this.top = rect.bottom + gap;
                                            } else {
                                                this.top = Math.max(edgePadding, rect.top - menuRect.height - gap);
                                            }
                                
                                            // Horizontal: rata kanan ke tombol, tapi clamp biar ga keluar layar
                                            let left = rect.right - menuRect.width;
                                            left = Math.min(left, window.innerWidth - menuRect.width - edgePadding);
                                            left = Math.max(left, edgePadding);
                                            this.left = left;
                                        });
                                    }
                                }">
                                    <button type="button" x-ref="trigger" title="Aksi lainnya"
                                        aria-label="Aksi lainnya" :class="{ 'is-open': open }" class="action-trigger"
                                        @click="toggle()" @click.outside="open = false">
                                        <svg viewBox="0 0 24 24" style="width:16px; height:16px;" fill="currentColor">
                                            <circle cx="12" cy="6" r="1.6" />
                                            <circle cx="12" cy="12" r="1.6" />
                                            <circle cx="12" cy="18" r="1.6" />
                                        </svg>
                                    </button>

                                    <div x-ref="menu" x-show="open" x-cloak @click.outside="open = false"
                                        :style="`position: fixed; top: ${top}px; left: ${left}px; z-index: 70;`"
                                        class="dropdown-menu" style="max-height: 60dvh; overflow-y: auto;">

                                        <a href="{{ route('admin.ustadz.edit', $item->id) }}" wire:navigate
                                            class="dropdown-item">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 16l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                            Edit Akun
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <button wire:click="deleteUser({{ $item->id }})"
                                            wire:confirm="Yakin ingin menghapus akun ini? Data tidak bisa dikembalikan."
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $users->links() }}
        </div>
    @endif
</div>
