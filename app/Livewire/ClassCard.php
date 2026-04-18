<?php

namespace App\Livewire;

use Livewire\Component;

class ClassCard extends Component
{
    // data kelas
    public $class;
    // lack exp data 
    public function render()
    {
        return view('livewire.courses.class-card');
    }
}
