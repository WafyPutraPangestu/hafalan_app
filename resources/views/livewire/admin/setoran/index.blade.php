<div x-data="{ showDeleteModal: false, setoranIdToDelete: null }" style="padding: 2rem 1.5rem;  margin: 0 auto;">
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Riwayat Setoran</h1>
            <p class="page-subtitle">Daftar rekapan hafalan santri yang telah dinilai.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.setoran.create') }}" wire:navigate class="btn btn-primary">
                + INPUT SETORAN
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header" style="flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px;">
                <input type="text" wire:model.live="search" class="form-input" placeholder="Cari nama santri...">
            </div>
            <div>
                <select wire:model.live="jenisFilter" class="form-select">
                    <option value="">Semua Jenis</option>
                    <option value="ziyadah">Ziyadah</option>
                    <option value="murojaah">Murojaah</option>
                </select>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Santri</th>
                        <th>Jenis</th>
                        <th>Surah & Ayat</th>
                        <th>Nilai</th>
                        <th>Penilai</th>
                        <th>Aksi</th>
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
                                <span class="text-caption">Kelas: {{ $setoran->siswa->kelas }}</span>
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
                            <td>
                                <span class="grade-badge grade-{{ strtolower($setoran->nilai) }}">
                                    {{ $setoran->nilai }}
                                </span>
                            </td>
                            <td class="text-caption">{{ $setoran->ustadz->name }}</td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.setoran.edit', $setoran->id) }}" wire:navigate
                                        class="btn btn-outline-primary btn-xs">Edit</a>
                                    <button @click="showDeleteModal = true; setoranIdToDelete = {{ $setoran->id }}"
                                        class="btn btn-danger btn-xs">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-title">Data Tidak Ditemukan</div>
                                    <p class="empty-state-desc">Belum ada rekapan setoran yang cocok.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($setorans->hasPages())
            <div class="card-footer">
                {{ $setorans->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div x-show="showDeleteModal" style="display: none;" class="modal-backdrop" x-transition.opacity>
        <div class="modal modal-sm" @click.away="showDeleteModal = false" x-transition.scale.origin.bottom>
            <div class="modal-header">
                <h3 class="modal-title">Hapus Setoran?</h3>
                <button @click="showDeleteModal = false" class="modal-close">✕</button>
            </div>
            <div class="modal-body">
                <p style="color: var(--color-neutral-600);">Apakah Anda yakin ingin menghapus catatan setoran hafalan
                    ini?</p>
            </div>
            <div class="modal-footer">
                <button @click="showDeleteModal = false" class="btn btn-ghost">Batal</button>
                <button @click="$wire.deleteSetoran(setoranIdToDelete).then(() => { showDeleteModal = false; })"
                    class="btn btn-danger">Ya, Hapus!</button>
            </div>
        </div>
    </div>
</div>
