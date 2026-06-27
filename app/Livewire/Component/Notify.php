<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class Notify extends Component
{
    /** @var array<int, array{id: int, type: string, title: string, message: string, duration: int}> */
    public array $toasts = [];

    private int $nextId = 0;

    /**
     * Dengarkan event 'notify' dari komponen Livewire mana pun.
     *
     * Cara pakai dari komponen lain:
     *   $this->dispatch('notify', type: 'success', title: 'Berhasil!', message: 'Data disimpan.');
     *
     * type: 'success' | 'danger' | 'warning' | 'info' | 'primary'
     * title: string
     * message: string (opsional)
     * duration: int ms (default 4000, 0 = tidak auto-close)
     */
    #[On('notify')]
    public function addToast(
        string $type    = 'info',
        string $title   = '',
        string $message = '',
        int    $duration = 4000,
    ): void {
        $this->nextId++;

        $this->toasts[] = [
            'id'       => $this->nextId,
            'type'     => $type,
            'title'    => $title,
            'message'  => $message,
            'duration' => $duration,
        ];
    }

    public function remove(int $id): void
    {
        $this->toasts = array_values(
            array_filter($this->toasts, fn($t) => $t['id'] !== $id)
        );
    }

    public function render()
    {
        return view('livewire.component.notify');
    }
}
