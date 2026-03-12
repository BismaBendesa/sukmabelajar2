<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

use App\Models\Classroom as ClassroomModel;

use Illuminate\Support\Facades\Auth;

class Classroom extends Component
{

    public $classData;
    public $showJoinModal = false;
    protected $listeners = ['join-class' => 'joinClass'];
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

        // $this->classData = Auth::user()->classrooms;
        // initial load of user's classes
        $this->classData = Auth::user()->classrooms()->latest()->get();
    }

    public function loadClasses()
    {
        $this->classData = Auth::user()->classrooms()->latest()->get();
    }

    // // Join Class
    // public function joinClass($classCode)
    // {
    //     $class = ClassroomModel::where('class_code', $classCode)->first();


    //     if (! $class) {
    //         $this->dispatch('show-toast', ['message' => 'Invalid class code', 'type' => 'error']);
    //         return;
    //     }

    //     if ($class->users()->where('user_id', Auth::id())->exists()) {
    //         $this->dispatch('show-toast', ['message' => 'Already joined', 'type' => 'error']);
    //         return;
    //     }

    //     $class->users()->attach(Auth::id());
    //     $this->classData = Auth::user()->fresh()->classrooms;

    //     $this->dispatch('show-toast', ['message' => 'Successfully joined class', 'type' => 'success']);
    //     $this->dispatch('close-modal'); // close the modal
    // }

    public function joinClass($payload)
    {
        $classCode = $payload['classCode'];

        $class = ClassroomModel::where('class_code', $classCode)->first();

        if (!$class) {
            $this->dispatch('show-toast', ['message' => 'Invalid class code', 'type' => 'error']);
            return;
        }

        if ($class->users()->where('user_id', auth()->id())->exists()) {
            $this->dispatch('show-toast', ['message' => 'Already joined', 'type' => 'error']);
            return;
        }

        // Attach user to class
        $class->users()->attach(auth()->id());

        // Reload classes for live update
        $this->loadClasses();

        $this->dispatch('show-toast', ['message' => 'Successfully joined class', 'type' => 'success']);
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.classroom', [
            //query data user
            'data' => User::latest()->get(),
            //query data kelas
            'classData' => Auth::user()->classrooms()->latest()->get(),
        ]);
    }
}
