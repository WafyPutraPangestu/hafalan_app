<div>
    <div class="page-header">
        <div class="page-header-text">
            <h1 class="page-title">Edit Akun</h1>
            <p class="page-subtitle">Perbarui data akun {{ $user->name }}.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.ustadz.index') }}" wire:navigate class="btn btn-ghost btn-md">
                Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <form wire:submit="update">
            <div class="card-body flex flex-col gap-4">
                <div class="form-group">
                    <label class="form-label form-label-required">Nama Lengkap</label>
                    <input type="text" wire:model="name" class="form-input @error('name') error @enderror">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label form-label-required">Email</label>
                    <input type="email" wire:model="email" class="form-input @error('email') error @enderror">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label form-label-required">Peran</label>
                    <select wire:model="role" class="form-select @error('role') error @enderror"
                        {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                        <option value="ustadz">Ustadz</option>
                        <option value="admin">Admin</option>
                    </select>
                    @if ($user->id === auth()->id())
                        <p class="form-hint">Kamu tidak bisa mengubah peran akunmu sendiri.</p>
                    @endif
                    @error('role')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="section-divider" style="margin: 0.5rem 0;"></div>

                <div class="form-row form-row-2">
                    <div class="form-group">
                        <label class="form-label">Kata Sandi Baru</label>
                        <input type="password" wire:model="password"
                            class="form-input @error('password') error @enderror"
                            placeholder="Kosongkan jika tidak diubah">
                        @error('password')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" wire:model="password_confirmation" class="form-input"
                            placeholder="Ulangi kata sandi baru">
                    </div>
                </div>
                <p class="form-hint" style="margin-top: -0.5rem;">
                    Biarkan kosong kedua kolom di atas jika tidak ingin mengubah kata sandi.
                </p>
            </div>

            <div class="card-footer flex justify-end gap-2">
                <a href="{{ route('admin.ustadz.index') }}" wire:navigate class="btn btn-ghost btn-md">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary btn-md" wire:loading.attr="disabled" wire:target="update">
                    <span wire:loading.remove wire:target="update">Simpan Perubahan</span>
                    <span wire:loading wire:target="update">Menyimpan...</span>
                </button>
            </div>
        </form>
    </div>
</div>
