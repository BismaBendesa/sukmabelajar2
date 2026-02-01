<?php

namespace App\Livewire;

use Livewire\Component;

class ClassCard extends Component
{
    // data kelas
    public $classes;
    // lack exp data 
    public function render()
    {
        return view('livewire.class-card');
    }
}
