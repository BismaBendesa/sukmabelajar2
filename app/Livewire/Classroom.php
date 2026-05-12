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
        $this->loadClasses();
    }

    // public function loadClasses()
    // {
    //     $this->classData = Auth::user()->classrooms()->latest()->get();
    // }

    public function loadClasses()
    {
        $user = Auth::user();
        $this->classData = $user->classrooms()
            ->with([
                'modules',
                'modules.test',
                'modules.progresses' => function ($q) use ($user) {
                    $q->where('user_id', $user->id)
                        ->where('is_completed', true);
                }
            ])
            ->latest()
            ->get()
            ->map(function ($class) {

                $totalModules = $class->modules->count();

                $completedModules = 0;

                foreach ($class->modules as $module) {

                    $bestProgress = $module->progresses
                        ->sortByDesc('score')
                        ->first();

                    if (!$bestProgress) {
                        continue;
                    }

                    if ($module->type === 'materi') {

                        if ($bestProgress->is_completed) {
                            $completedModules++;
                        }
                    } else {

                        $minimumScore = $module->test?->minimum_pass_score ?? 70;

                        if ($bestProgress->score >= $minimumScore) {
                            $completedModules++;
                        }
                    }
                }

                $progress = $totalModules > 0
                    ? round(($completedModules / $totalModules) * 100)
                    : 0;

                return [
                    'id' => $class->id,
                    'slug' => $class->slug,
                    'name' => $class->name,
                    'description' => $class->description,
                    'class_code' => $class->class_code,
                    'progress' => $progress,
                    'completed_modules' => $completedModules,
                    'total_modules' => $totalModules,
                ];
            });
    }

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
        return view('livewire.courses.classroom')->layout('layouts.app', [
            //query data user
            'data' => User::latest()->get(),
            //query data kelas
            'classData' => Auth::user()->classrooms()->latest()->get(),
            'header' => [
                'title' => 'Kelas',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50
            ]
        ]);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
