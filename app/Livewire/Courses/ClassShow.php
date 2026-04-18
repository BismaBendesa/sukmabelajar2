<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Classroom as ClassroomModel;

class ClassShow extends Component
{
    public $class;
    // Header Data
    public function mount($slug)
    {
        $this->class = ClassroomModel::with('modules')
            ->where('slug', $slug)
            ->firstOrFail();
        // harus bisa tarik module sesuai kelas
    }

    public function render()
    {
        // $this->title = "Detail Kelas";
        return view('livewire.courses.class-show')->layout('layouts.app', [
            'class' => $this->class,
            'header' => [
                'title' => 'Detail Kelas',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50,
                'mode' => 'KELAS'
            ]
        ]);
        // return view('livewire.courses.class-show');
    }
}
