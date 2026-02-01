<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Classes as ClassesModel;
use Livewire\Component;

class Classes extends Component
{
    // Header Data
    public function mount()
    {
        $this->dispatch(
            'setHeader',
            mode: 'DEFAULT',
            data: [
                'title' => 'Kelas',
                'level' => 19,
                'rank' => 1,
                'xp'    => 50
            ]
        );
    }
    public function render()
    {
        return view('livewire.classes', [
            //query data user
            'data' => User::latest()->get(),
            //query data kelas
            'classData' => ClassesModel::latest()->get(),
        ]);
    }
}
