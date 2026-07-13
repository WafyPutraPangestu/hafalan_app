<div>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
        <div class="page-header-text">
            <h1 class="page-title">Tambah Akun</h1>
            <p class="page-subtitle">Buat akun baru untuk admin atau ustadz.</p>
        </div>
        <div class="page-header-actions">
            <a href="{{ route('admin.ustadz.index') }}" wire:navigate class="btn btn-ghost btn-md">
                Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <form wire:submit="save">
            <div class="card-body flex flex-col gap-4">
                <div class="form-group">
                    <label class="form-label form-label-required">Nama Lengkap</label>
                    <input type="text" wire:model="name" class="form-input @error('name') error @enderror"
                        placeholder="Contoh: Ahmad Fauzi">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label form-label-required">Email</label>
                    <input type="email" wire:model="email" class="form-input @error('email') error @enderror"
                        placeholder="nama@email.com">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label form-label-required">Peran</label>
                    <select wire:model="role" class="form-select @error('role') error @enderror">
                        <option value="ustadz">Ustadz</option>
                        <option value="admin">Admin</option>
                    </select>
                    <p class="form-hint">Ustadz hanya bisa input & lihat setoran miliknya sendiri. Admin punya akses
                        penuh.</p>
                    @error('role')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row form-row-2">
                    <div class="form-group">
                        <label class="form-label form-label-required">Kata Sandi</label>
                        <input type="password" wire:model="password"
                            class="form-input @error('password') error @enderror" placeholder="Minimal 8 karakter">
                        @error('password')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label form-label-required">Konfirmasi Kata Sandi</label>
                        <input type="password" wire:model="password_confirmation" class="form-input"
                            placeholder="Ulangi kata sandi">
                    </div>
                </div>
            </div>

            <div class="card-footer flex justify-end gap-2">
                <a href="{{ route('admin.ustadz.index') }}" wire:navigate class="btn btn-ghost btn-md">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary btn-md" wire:loading.attr="disabled" wire:target="save">
                    <span wire:loading.remove wire:target="save">Simpan Akun</span>
                    <span wire:loading wire:target="save">Menyimpan...</span>
                </button>
            </div>
        </form>
    </div>
</div>
