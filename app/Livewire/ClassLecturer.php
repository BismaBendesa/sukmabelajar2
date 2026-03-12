<?php

namespace App\Livewire;

use Livewire\Component;

class ClassLecturer extends Component
{
    public function mount()
    {
        $this->dispatch(
            'setHeader',
            mode: 'HELP',
            data: [
                'title' => 'Daftar Kelas',
                'level' => 19,
                'rank' => 1,
                'xp'    => 50
            ]
        );
    }

    public function render()
    {
        return view('livewire.class-lecturer');
    }
}
