<style>
    .portal-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        position: relative;
        overflow: hidden;
        background: var(--color-neutral-50);
        background-image:
            radial-gradient(circle at 1px 1px, var(--color-primary-200) 1px, transparent 0);
        background-size: 28px 28px;
    }

    .portal-page::before,
    .portal-page::after {
        content: "";
        position: absolute;
        width: 480px;
        height: 480px;
        border-radius: 50%;
        background: var(--color-primary-200);
        opacity: 0.35;
        filter: blur(60px);
        pointer-events: none;
    }

    .portal-page::before {
        top: -180px;
        left: -180px;
    }

    .portal-page::after {
        bottom: -200px;
        right: -160px;
        background: var(--color-primary-300);
        opacity: 0.25;
    }

    .portal-wrap {
        width: 100%;
        max-width: 460px;
        position: relative;
        z-index: 1;
    }

    .portal-emblem {
        width: 76px;
        height: 76px;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        background: var(--color-neutral-900);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .portal-emblem::before {
        content: "";
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 1.5px solid var(--color-primary-400);
        opacity: 0.6;
        animation: portal-pulse 2.8s ease-in-out infinite;
    }

    @keyframes portal-pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.6;
        }

        50% {
            transform: scale(1.12);
            opacity: 0.15;
        }
    }

    .portal-eyebrow {
        font-family: var(--font-arabic);
        font-size: 1.0625rem;
        color: var(--color-primary-700);
        text-align: center;
        margin-bottom: 0.375rem;
        letter-spacing: 0;
    }

    .portal-title {
        text-align: center;
        font-size: clamp(1.5rem, 5vw, 1.875rem);
        font-weight: 800;
        letter-spacing: -0.02em;
        color: var(--color-neutral-900);
        margin-bottom: 0.5rem;
    }

    .portal-lead {
        text-align: center;
        font-size: 0.9375rem;
        color: var(--color-neutral-600);
        line-height: 1.6;
        max-width: 340px;
        margin: 0 auto 2rem;
    }

    .portal-card {
        background: white;
        border-radius: var(--radius-2xl);
        border: 1px solid var(--color-neutral-200);
        box-shadow: var(--shadow-xl);
        padding: 2.25rem 1.75rem;
        position: relative;
        overflow: hidden;
    }

    .portal-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--color-primary-300), var(--color-primary-500), var(--color-primary-300));
    }

    .portal-label {
        text-align: center;
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--color-neutral-500);
        margin-bottom: 0.875rem;
    }

    .portal-input {
        width: 100%;
        text-align: center;
        font-family: "Courier New", monospace;
        font-size: 1.75rem;
        font-weight: 800;
        letter-spacing: 0.35em;
        text-indent: 0.35em;
        padding: 1rem 0.5rem;
        color: var(--color-neutral-900);
        background: var(--color-neutral-50);
        border: 2px solid var(--color-neutral-200);
        border-radius: var(--radius-lg);
        transition: all var(--duration-fast) var(--ease-default);
    }

    .portal-input::placeholder {
        color: var(--color-neutral-300);
        letter-spacing: 0.35em;
    }

    .portal-input:focus {
        outline: none;
        background: white;
        border-color: var(--color-primary-400);
        box-shadow: 0 0 0 4px rgba(163, 230, 53, 0.25);
    }

    .portal-input.error {
        border-color: var(--color-danger-500);
    }

    .portal-submit {
        margin-top: 1.5rem;
    }

    .portal-back {
        display: block;
        text-align: center;
        margin-top: 1.125rem;
        font-size: 0.8125rem;
        font-weight: 700;
        color: var(--color-neutral-500);
        text-decoration: none;
        transition: color var(--duration-fast);
    }

    .portal-back:hover {
        color: var(--color-neutral-900);
    }

    .portal-footer {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        justify-content: center;
        text-align: center;
        margin-top: 1.75rem;
        color: var(--color-neutral-500);
        font-size: 0.8125rem;
        font-weight: 600;
        line-height: 1.5;
    }

    .portal-footer svg {
        flex-shrink: 0;
        margin-top: 0.125rem;
        opacity: 0.7;
    }

    @media (prefers-reduced-motion: reduce) {
        .portal-emblem::before {
            animation: none;
        }
    }
</style>

<div class="portal-page">
    <div class="portal-wrap">

        <div class="portal-emblem">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary-400)"
                stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 7c-2-1.5-4.5-2-7-1v13c2.5-1 5-.5 7 1 2-1.5 4.5-2 7-1V6c-2.5-1-5-.5-7 1z" />
                <path d="M12 7v13" />
            </svg>
        </div>

        <p class="portal-eyebrow">بوابة أولياء الأمور</p>
        <h1 class="portal-title">Portal Wali Murid</h1>
        <p class="portal-lead">
            Masukkan kode akses santri untuk memantau progres hafalan Al-Qur'an ananda secara
            <span class="text-highlight">real-time</span>.
        </p>

        <form wire:submit="cari" class="portal-card">
            <label class="portal-label">Kode akses santri</label>

            <input type="text" wire:model="kode_akses" class="portal-input @error('kode_akses') error @enderror"
                placeholder="XXXXXX" autocomplete="off" autofocus>

            @error('kode_akses')
                <div class="alert alert-danger" style="margin-top: 1rem;">
                    <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    <span class="form-error" style="margin: 0;">{{ $message }}</span>
                </div>
            @enderror

            <button type="submit" class="btn btn-primary btn-xl btn-block portal-submit">
                <span wire:loading.remove wire:target="cari">Cek progress &rarr;</span>
                <span wire:loading wire:target="cari">Mencari data...</span>
            </button>

            <a href="/" wire:navigate class="portal-back">&larr; Kembali ke beranda</a>
        </form>

        <div class="portal-footer">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                <line x1="12" y1="17" x2="12.01" y2="17" />
            </svg>
            <span>Hubungi Ustadz/Wali Kelas jika Anda tidak mengetahui kode akses ananda.</span>
        </div>

    </div>
</div>
