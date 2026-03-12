<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $classCode;
    public bool $showModal = false;
    // Join Class Confirmation
    protected $rules = [
        'classCode' => 'required|min:4',
    ];

    public function confirm()
    {
        // dispatch a browser event that the parent listens to
        $this->dispatch('join-class', ['classCode' => $this->classCode]);

        // Optional: clear input
        $this->reset('classCode');
    }

    #[On('open-modal')]
    public function open()
    {
        $this->showModal = true;
    }
}
