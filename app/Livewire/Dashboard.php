<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        // $this->dispatch(
        //     'setHeader',
        //     mode: 'LOGOUT',
        //     // mode : DEFAULT | KELAS | MATERI | TEST | LOGOUT | HELP
        //     data: [
        //         'title' => 'Dashboard',
        //         'level' => 19,
        //         'rank' => 1,
        //     ]
        // );
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app', [
            'header' => [
                'title' => 'Dashboard',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50
            ]
        ]);
    }
}
