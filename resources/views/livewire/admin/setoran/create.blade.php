<div style="padding: 2rem 1.5rem; max-width: 860px; margin: 0 auto;">
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Input Setoran Baru</h1>
            <p class="page-subtitle">Catat <span class="text-highlight">progres hafalan</span> santri hari ini.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.setoran.index') }}" wire:navigate class="btn btn-secondary">KEMBALI</a>
        </div>
    </div>

    <form wire:submit="save" class="card" style="max-width: 900px;">
        <div class="card-body" style="display: grid; gap: 1.5rem; grid-template-columns: 1fr 1fr;">

            <!-- 1. SEARCHABLE DROPDOWN SISWA (Alpine + Livewire) -->
            <div class="form-group" style="grid-column: span 2; position: relative;" x-data="{ dropdownOpen: false }">
                <label class="form-label form-label-required">Cari & Pilih Santri</label>

                <div @click.away="dropdownOpen = false">
                    <input type="text" wire:model.live.debounce.300ms="searchSiswa" @focus="dropdownOpen = true"
                        @input="dropdownOpen = true; $wire.set('siswa_id', null)" class="form-input form-input-lg"
                        placeholder="Ketik nama santri..." autocomplete="off">

                    <!-- Dropdown List Hasil Pencarian -->
                    <div x-show="dropdownOpen && $wire.searchSiswa.length > 0" x-transition class="dropdown-menu"
                        style="width: 100%; top: calc(100% + 4px); max-height: 250px; overflow-y: auto; padding: 0.5rem;"
                        x-cloak>
                        @forelse($siswas as $s)
                            <button type="button"
                                @click="$wire.selectSiswa({{ $s->id }}, '{{ addslashes($s->nama) }}'); dropdownOpen = false;"
                                class="dropdown-item"
                                style="padding: 0.75rem; display: flex; align-items: center; gap: 1rem;">
                                <div class="avatar avatar-sm">
                                    {{ substr($s->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div style="font-weight: 700; color: var(--color-neutral-900);">{{ $s->nama }}
                                    </div>
                                    <div style="font-size: 0.75rem; color: var(--color-neutral-500);">NIS:
                                        {{ $s->nis }} &bull; Kelas: {{ $s->kelas }}</div>
                                </div>
                            </button>
                        @empty
                            <div
                                style="padding: 1rem; text-align: center; color: var(--color-neutral-500); font-size: 0.875rem;">
                                Santri tidak ditemukan.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Hidden input untuk validasi error -->
                <input type="hidden" wire:model="siswa_id">
                @error('siswa_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- 2. WAKTU & JENIS -->
            <div class="section-divider" style="grid-column: span 2; margin: 0.5rem 0;"></div>

            <div class="form-group">
                <label class="form-label form-label-required">Tanggal</label>
                <input type="date" wire:model="tanggal" class="form-input">
                @error('tanggal')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label form-label-required">Jam</label>
                <input type="time" wire:model="jam" class="form-input">
                @error('jam')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="grid-column: span 2;">
                <label class="form-label form-label-required">Jenis Setoran</label>
                <div style="display: flex; gap: 1rem;">
                    <label class="form-check"
                        style="background: var(--color-neutral-50); padding: 1rem; border-radius: var(--radius-lg); flex: 1; border: 2px solid var(--color-neutral-200);">
                        <input type="radio" wire:model="jenis" value="ziyadah" class="form-check-input">
                        <span class="form-check-label">
                            <strong style="display: block; color: var(--color-neutral-900);">Ziyadah</strong>
                            <span style="font-size: 0.75rem; color: var(--color-neutral-500);">Hafalan baru</span>
                        </span>
                    </label>
                    <label class="form-check"
                        style="background: var(--color-neutral-50); padding: 1rem; border-radius: var(--radius-lg); flex: 1; border: 2px solid var(--color-neutral-200);">
                        <input type="radio" wire:model="jenis" value="murojaah" class="form-check-input">
                        <span class="form-check-label">
                            <strong style="display: block; color: var(--color-neutral-900);">Murojaah</strong>
                            <span style="font-size: 0.75rem; color: var(--color-neutral-500);">Pengulangan
                                hafalan</span>
                        </span>
                    </label>
                </div>
            </div>

            <!-- 3. RENTANG HAFALAN -->
            <div class="form-group">
                <label class="form-label form-label-required">Surah Awal</label>
                <input type="text" wire:model="surah_awal" class="form-input" placeholder="Contoh: Al-Baqarah">
                @error('surah_awal')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label form-label-required">Ayat Awal</label>
                <input type="number" wire:model="ayat_awal" class="form-input" placeholder="Contoh: 1">
                @error('ayat_awal')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label form-label-required">Surah Akhir</label>
                <input type="text" wire:model="surah_akhir" class="form-input" placeholder="Contoh: Al-Baqarah">
                @error('surah_akhir')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label form-label-required">Ayat Akhir</label>
                <input type="number" wire:model="ayat_akhir" class="form-input" placeholder="Contoh: 5">
                @error('ayat_akhir')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <!-- 4. HASIL & NILAI -->
            <div class="section-divider" style="grid-column: span 2; margin: 0.5rem 0;"></div>

            <div class="form-group">
                <label class="form-label form-label-required">Jml Halaman (Desimal)</label>
                <input type="number" step="0.1" wire:model="jumlah_halaman" class="form-input"
                    placeholder="Contoh: 1.5">
                @error('jumlah_halaman')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label form-label-required">Nilai</label>
                <select wire:model="nilai" class="form-select form-input-lg" style="font-weight: 800;">
                    <option value="A">A (Sangat Lancar)</option>
                    <option value="B">B (Lancar)</option>
                    <option value="C">C (Cukup / Kurang Lancar)</option>
                    <option value="D">D (Mengulang)</option>
                </select>
                @error('nilai')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group" style="grid-column: span 2;">
                <label class="form-label">Catatan Tambahan (Opsional)</label>
                <textarea wire:model="catatan" class="form-textarea"
                    placeholder="Tuliskan pesan atau koreksi tajwid untuk santri dan wali murid..."></textarea>
                @error('catatan')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="card-footer" style="text-align: right;">
            <button type="submit" class="btn btn-primary btn-xl" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="save">SIMPAN SETORAN</span>
                <span wire:loading wire:target="save">MENYIMPAN...</span>
            </button>
        </div>
    </form>
</div>
