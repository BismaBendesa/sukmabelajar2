<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Classroom as ClassroomModel;
use App\Models\UserModuleProgress;

class ClassShow extends Component
{
    public $class;
    public $modulesWithState = [];

    public function mount($slug)
    {
        $this->class = ClassroomModel::with([
            'modules',
            'modules.test'
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $user = auth()->user();

        $this->modulesWithState = $this->class->modules->map(function ($module) use ($user) {

            // ambil semua progress user untuk module ini
            $progresses = UserModuleProgress::where('user_id', $user->id)
                ->where('module_id', $module->id)
                ->where('is_completed', true)
                ->get();

            $hasAttempt = $progresses->count() > 0;

            /*
            |--------------------------------------------------------------------------
            | PASS LOGIC
            |--------------------------------------------------------------------------
            */

            if ($module->type === 'materi') {

                // sementara materi pakai >= 70
                $isPassed = $progresses->contains(
                    fn($p) => $p->score >= 70
                );
            } else {

                $minimumScore = $module->test?->minimum_pass_score ?? 70;

                $isPassed = $progresses->contains(
                    fn($p) => $p->score >= $minimumScore
                );
            }

            /*
            |--------------------------------------------------------------------------
            | MODE
            |--------------------------------------------------------------------------
            */

            $mode = 'default';

            if ($isPassed) {
                $mode = 'done';
            } elseif ($hasAttempt) {
                $mode = 'try-again';
            }

            // inject dynamic property
            $module->mode = $mode;

            return $module;
        });
    }

    public function render()
    {
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
    }
}
