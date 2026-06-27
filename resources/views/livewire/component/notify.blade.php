<div class="toast-container" aria-live="polite" aria-atomic="false">

    @foreach ($toasts as $toast)
        <div wire:key="toast-{{ $toast['id'] }}" x-data="{
            show: false,
            duration: {{ $toast['duration'] }},
            timer: null,
        
            init() {
                this.$nextTick(() => { this.show = true });
        
                if (this.duration > 0) {
                    this.timer = setTimeout(() => this.dismiss(), this.duration);
                }
            },
        
            dismiss() {
                clearTimeout(this.timer);
                this.show = false;
                setTimeout(() => $wire.remove({{ $toast['id'] }}), 300);
            },
        
            pauseTimer() {
                if (this.timer) clearTimeout(this.timer);
            },
        
            resumeTimer() {
                if (this.duration > 0) {
                    this.timer = setTimeout(() => this.dismiss(), this.duration);
                }
            }
        }" x-init="init()" x-show="show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-full"
            @mouseenter="pauseTimer()" @mouseleave="resumeTimer()" class="toast toast-{{ $toast['type'] }}"
            role="alert">

            {{-- Icon per type --}}
            <div class="toast-icon flex-shrink-0">
                @switch($toast['type'])
                    @case('success')
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                    @break

                    @case('danger')
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="15" x2="9" y1="9" y2="15" />
                            <line x1="9" x2="15" y1="9" y2="15" />
                        </svg>
                    @break

                    @case('warning')
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                            <path d="M12 9v4" />
                            <path d="M12 17h.01" />
                        </svg>
                    @break

                    @case('primary')
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                    @break

                    @default
                        {{-- info --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4" />
                            <path d="M12 8h.01" />
                        </svg>
                @endswitch
            </div>

            {{-- Body --}}
            <div class="toast-body">
                @if ($toast['title'])
                    <p class="toast-title">{{ $toast['title'] }}</p>
                @endif
                @if ($toast['message'])
                    <p class="toast-message">{{ $toast['message'] }}</p>
                @endif
            </div>

            {{-- Progress bar (jika ada duration) --}}
            @if ($toast['duration'] > 0)
                <div class="absolute bottom-0 left-0 right-0 h-[2.5px] rounded-b-[--radius-lg] overflow-hidden">
                    <div class="h-full origin-left" style="background: currentColor; opacity: 0.25;" x-data
                        x-init="$el.style.transform = 'scaleX(1)';
                        $el.style.transition = 'transform {{ $toast['duration'] }}ms linear';
                        requestAnimationFrame(() => { $el.style.transform = 'scaleX(0)'; });">
                    </div>
                </div>
            @endif

            {{-- Close button --}}
            <button @click="dismiss()" class="toast-close" aria-label="Tutup notifikasi">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
    @endforeach
</div>
