<div style="padding: 2rem 1.5rem; max-width: 860px; margin: 0 auto;">

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
        <a href="{{ route('admin.siswa.show', $siswa) }}" wire:navigate
            style="color: var(--color-neutral-500); text-decoration: none; transition: color 0.15s;"
            onmouseover="this.style.color='var(--color-neutral-900)'"
            onmouseout="this.style.color='var(--color-neutral-500)'">
            {{ $siswa->nama }}
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
        </svg>
        <span style="color: var(--color-neutral-900);">Edit</span>
    </div>

    {{-- Page Header --}}
    <div class="page-header" style="margin-bottom: 2rem;">
        <div class="page-header-text">
            <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.25rem;">Edit Data</p>
            <h1 class="page-title">Ubah Data Siswa</h1>
            <p class="page-subtitle">Perbarui informasi santri. Kode akses wali murid tidak akan berubah.</p>
        </div>
        <div class="page-header-actions">
            <span class="badge badge-{{ $siswa->status === 'aktif' ? 'success' : 'neutral' }} badge-dot"
                style="font-size: 0.8rem; padding: 0.3rem 0.875rem;">
                {{ ucfirst($siswa->status) }}
            </span>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div
                    style="width: 36px; height: 36px; background: var(--color-primary-100); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--color-neutral-900);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                    </svg>
                </div>
                <div>
                    <h5 style="margin: 0; font-weight: 800; text-transform: uppercase; letter-spacing: 0.03em;">Edit
                        Identitas</h5>
                    <p style="margin: 0; font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600;">NIS:
                        {{ $siswa->nis }}</p>
                </div>
            </div>
            <span class="info-chip" style="font-size: 0.75rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                Kode: {{ $siswa->kode_akses }}
            </span>
        </div>

        <div class="card-body">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">

                {{-- Nama --}}
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label form-label-required">Nama Lengkap</label>
                    <input wire:model="nama" type="text" class="form-input @error('nama') error @enderror"
                        placeholder="Nama lengkap santri" />
                    @error('nama')
                        <span class="form-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- NIS --}}
                <div class="form-group">
                    <label class="form-label form-label-required">NIS</label>
                    <div class="input-wrapper input-icon-left">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="5" rx="2" />
                            <line x1="2" x2="22" y1="10" y2="10" />
                        </svg>
                        <input wire:model="nis" type="text" class="form-input @error('nis') error @enderror"
                            placeholder="Nomor Induk Siswa" />
                    </div>
                    @error('nis')
                        <span class="form-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Kelas --}}
                <div class="form-group">
                    <label class="form-label form-label-required">Kelas</label>
                    <input wire:model="kelas" type="text" class="form-input @error('kelas') error @enderror"
                        placeholder="Contoh: 7A" />
                    @error('kelas')
                        <span class="form-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Tanggal Masuk --}}
                <div class="form-group">
                    <label class="form-label form-label-required">Tanggal Masuk</label>
                    <input wire:model="tanggal_masuk" type="date"
                        class="form-input @error('tanggal_masuk') error @enderror" />
                    @error('tanggal_masuk')
                        <span class="form-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label class="form-label form-label-required">Status</label>
                    <select wire:model="status" class="form-select @error('status') error @enderror">
                        <option value="aktif">Aktif</option>
                        <option value="alumni">Alumni</option>
                    </select>
                    @error('status')
                        <span class="form-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4" />
                                <path d="M12 16h.01" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>
        </div>

        <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center;">
            <p style="font-size: 0.75rem; color: var(--color-neutral-400); font-weight: 600;">
                Terakhir diperbarui: {{ $siswa->updated_at->diffForHumans() }}
            </p>
            <div style="display: flex; gap: 0.625rem;">
                <a href="{{ route('admin.siswa.index') }}" wire:navigate class="btn btn-secondary btn-md">
                    Batal
                </a>
                <button wire:click="update" wire:loading.attr="disabled" wire:loading.class="loading"
                    class="btn btn-primary btn-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                        <polyline points="17 21 17 13 7 13 7 21" />
                        <polyline points="7 3 7 8 15 8" />
                    </svg>
                    <span wire:loading.remove wire:target="update">Simpan Perubahan</span>
                    <span wire:loading wire:target="update">Menyimpan...</span>
                </button>
            </div>
        </div>
    </div>

</div>
