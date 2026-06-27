<div
    style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--color-neutral-50); padding: 1.5rem;">
    <div style="width: 100%; max-width: 500px;">

        <div style="text-align: center; margin-bottom: 2rem;">
            <div class="avatar avatar-2xl" style="background: var(--color-primary-400); margin: 0 auto 1rem;">
                📖
            </div>
            <h1 class="h2" style="text-transform: uppercase;">Portal Wali Murid</h1>
            <p class="text-lead">Pantau progres hafalan Al-Qur'an ananda secara <span
                    class="text-highlight">real-time</span>.</p>
        </div>

        <form wire:submit="cari" class="card card-raised" style="padding: 2.5rem 2rem;">
            <div class="form-group">
                <label class="form-label" style="text-align: center; display: block; font-size: 1rem;">Masukkan Kode
                    Akses Santri</label>
                <input type="text" wire:model="kode_akses" class="form-input form-input-lg"
                    style="text-align: center; font-family: monospace; font-size: 1.5rem; letter-spacing: 0.2em; font-weight: 800;"
                    placeholder="XXXXXX" autocomplete="off" autofocus>
                @error('kode_akses')
                    <div class="alert alert-danger" style="margin-top: 1rem;">
                        <span class="form-error" style="margin: 0; font-size: 0.875rem;">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-xl btn-block" style="margin-top: 2rem;">
                <span wire:loading.remove wire:target="cari">CEK PROGRESS &rarr;</span>
                <span wire:loading wire:target="cari">MENCARI DATA...</span>
            </button>
        </form>

        <p
            style="text-align: center; margin-top: 2rem; color: var(--color-neutral-500); font-size: 0.875rem; font-weight: 600;">
            Silakan hubungi Ustadz/Wali Kelas jika Anda tidak mengetahui Kode Akses ananda.
        </p>

    </div>
</div>
