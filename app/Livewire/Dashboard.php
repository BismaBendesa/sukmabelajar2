<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        $this->dispatch(
            'setHeader',
            mode: 'BUTTON',
            // mode : DEFAULT | KELAS | MATERI | TEST | BUTTON
            data: [
                'title' => 'Dashboard',
                'level' => 19,
                'rank' => 1,
            ]
        );
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
