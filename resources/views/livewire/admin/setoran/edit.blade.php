<div>
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Edit Setoran</h1>
            <p class="page-subtitle">Perbarui data setoran hafalan santri.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.setoran.index') }}" wire:navigate class="btn btn-ghost btn-md">
                Batal
            </a>
        </div>
    </div>

    <form wire:submit.prevent="update">
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="h4">Data Santri &amp; Waktu</h3>
            </div>
            <div class="card-body">
                <div class="form-row form-row-2">

                    {{-- Search Siswa --}}
                    <div class="form-group" x-data="{ open: false }" @click.outside="open = false">
                        <label class="form-label form-label-required">Santri</label>
                        <div class="input-wrapper input-icon-left relative">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="11" cy="11" r="7" />
                                <path stroke-linecap="round" d="M21 21l-4.35-4.35" />
                            </svg>
                            <input type="text" wire:model.live.debounce.300ms="searchSiswa" @focus="open = true"
                                @input="open = true" placeholder="Ketik nama santri..." autocomplete="off"
                                class="form-input @error('siswa_id') error @enderror">
                        </div>

                        @if (count($siswas) > 0)
                            <div class="dropdown-menu" x-show="open" x-cloak
                                style="position: static; margin-top: 0.375rem; box-shadow: var(--shadow-md);">
                                @foreach ($siswas as $s)
                                    <button type="button"
                                        wire:click="selectSiswa({{ $s->id }}, '{{ addslashes($s->nama) }}')"
                                        @click="open = false" class="dropdown-item">
                                        <div class="avatar avatar-xs">{{ strtoupper(substr($s->nama, 0, 1)) }}</div>
                                        <div class="min-w-0">
                                            <div class="font-semibold truncate">{{ $s->nama }}</div>
                                            <div class="text-caption">NIS {{ $s->nis }} &middot;
                                                {{ $s->kelas }}</div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        @error('siswa_id')
                            <span class="form-error">
                                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="3">
                                    <circle cx="12" cy="12" r="10" />
                                    <path stroke-linecap="round" d="M12 8v4m0 4h.01" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ustadz Penilai</label>
                        <input type="text" value="{{ $setoran->ustadz->name }}" disabled class="form-input">
                        <p class="form-hint">Ustadz asli yang mencatat tidak berubah saat diedit.</p>
                    </div>
                </div>

                <div class="form-row form-row-2 mt-4">
                    <div class="form-group">
                        <label class="form-label form-label-required">Tanggal</label>
                        <input type="date" wire:model="tanggal" class="form-input @error('tanggal') error @enderror">
                        @error('tanggal')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label form-label-required">Jam</label>
                        <input type="time" wire:model="jam" class="form-input @error('jam') error @enderror">
                        @error('jam')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="h4">Jenis &amp; Tingkatan Hafalan</h3>
            </div>
            <div class="card-body">
                <div class="form-row form-row-2">
                    <div class="form-group">
                        <label class="form-label form-label-required">Jenis Setoran</label>
                        <select wire:model="jenis" class="form-select @error('jenis') error @enderror">
                            <option value="ziyadah">Ziyadah — Tambah Hafalan Baru</option>
                            <option value="murojaah">Murojaah — Mengulang Hafalan</option>
                            <option value="tadarus">Tadarus — Membaca Al-Qur'an</option>
                        </select>
                        @error('jenis')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label form-label-required">Tingkatan</label>
                        <select wire:model.live="tingkatan" class="form-select @error('tingkatan') error @enderror">
                            <option value="iqro">Iqro</option>
                            <option value="juz_ama">Juz Amma</option>
                            <option value="quran">Al-Qur'an (30 Juz)</option>
                        </select>
                        @error('tingkatan')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="section-divider"></div>

                {{-- ===== FIELD: IQRO ===== --}}
                @if ($tingkatan === 'iqro')
                    <div class="badge badge-primary mb-3">Materi Iqro</div>

                    <p class="text-label mb-2">Posisi Awal</p>
                    <div class="form-row form-row-3">
                        <div class="form-group">
                            <label class="form-label form-label-required">Iqro Ke-</label>
                            <input type="number" min="1" max="6" wire:model="iqro_awal"
                                class="form-input @error('iqro_awal') error @enderror">
                            @error('iqro_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Halaman</label>
                            <input type="number" min="1" wire:model="halaman_iqro_awal"
                                class="form-input @error('halaman_iqro_awal') error @enderror">
                            @error('halaman_iqro_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Ayat / Baris</label>
                            <input type="number" min="1" wire:model="ayat_iqro_awal"
                                class="form-input @error('ayat_iqro_awal') error @enderror">
                            @error('ayat_iqro_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <p class="text-label mb-2 mt-4">Posisi Akhir</p>
                    <div class="form-row form-row-3">
                        <div class="form-group">
                            <label class="form-label form-label-required">Iqro Ke-</label>
                            <input type="number" min="1" max="6" wire:model="iqro_akhir"
                                class="form-input @error('iqro_akhir') error @enderror">
                            @error('iqro_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Halaman</label>
                            <input type="number" min="1" wire:model="halaman_iqro_akhir"
                                class="form-input @error('halaman_iqro_akhir') error @enderror">
                            @error('halaman_iqro_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Ayat / Baris</label>
                            <input type="number" min="1" wire:model="ayat_iqro_akhir"
                                class="form-input @error('ayat_iqro_akhir') error @enderror">
                            @error('ayat_iqro_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

                {{-- ===== FIELD: JUZ AMA ===== --}}
                @if ($tingkatan === 'juz_ama')
                    <div class="badge badge-primary mb-3">Materi Juz Amma</div>
                    <p class="form-hint mb-3">Bisa satu surat atau lintas surat.</p>

                    <p class="text-label mb-2">Mulai Dari</p>
                    <div class="form-row form-row-2">
                        <div class="form-group">
                            <label class="form-label form-label-required">Surah Awal</label>
                            <input type="text" wire:model="surah_awal"
                                class="form-input @error('surah_awal') error @enderror">
                            @error('surah_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Ayat Awal</label>
                            <input type="number" min="1" wire:model="ayat_awal"
                                class="form-input @error('ayat_awal') error @enderror">
                            @error('ayat_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <p class="text-label mb-2 mt-4">Sampai Dengan</p>
                    <div class="form-row form-row-2">
                        <div class="form-group">
                            <label class="form-label form-label-required">Surah Akhir</label>
                            <input type="text" wire:model="surah_akhir"
                                class="form-input @error('surah_akhir') error @enderror">
                            @error('surah_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Ayat Akhir</label>
                            <input type="number" min="1" wire:model="ayat_akhir"
                                class="form-input @error('ayat_akhir') error @enderror">
                            @error('ayat_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

                {{-- ===== FIELD: QURAN ===== --}}
                @if ($tingkatan === 'quran')
                    <div class="badge badge-primary mb-3">Materi Al-Qur'an</div>

                    <div class="form-row form-row-3">
                        <div class="form-group">
                            <label class="form-label form-label-required">Juz</label>
                            <input type="text" wire:model="juz" class="form-input @error('juz') error @enderror">
                            @error('juz')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Halaman Awal</label>
                            <input type="number" min="1" wire:model="halaman_awal"
                                class="form-input @error('halaman_awal') error @enderror">
                            @error('halaman_awal')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-required">Halaman Akhir</label>
                            <input type="number" min="1" wire:model="halaman_akhir"
                                class="form-input @error('halaman_akhir') error @enderror">
                            @error('halaman_akhir')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="h4">Penilaian</h3>
            </div>
            <div class="card-body">
                <div class="form-row form-row-2">
                    <div class="form-group">
                        <label class="form-label form-label-required">Jumlah Halaman</label>
                        <input type="number" step="0.1" min="0.1" wire:model="jumlah_halaman"
                            class="form-input @error('jumlah_halaman') error @enderror">
                        @error('jumlah_halaman')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label form-label-required">Nilai</label>
                        <select wire:model="nilai" class="form-select @error('nilai') error @enderror">
                            <option value="A">A — Sangat Baik</option>
                            <option value="B">B — Baik</option>
                            <option value="C">C — Cukup</option>
                            <option value="D">D — Perlu Perbaikan</option>
                        </select>
                        @error('nilai')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label class="form-label">Catatan (opsional)</label>
                    <textarea wire:model="catatan" rows="3" class="form-textarea"></textarea>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-end gap-2">
            <a href="{{ route('admin.setoran.index') }}" wire:navigate class="btn btn-ghost btn-md">
                Batal
            </a>
            <button type="submit" wire:loading.attr="disabled" wire:target="update" class="btn btn-primary btn-md"
                wire:loading.class="loading" wire:target="update">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
