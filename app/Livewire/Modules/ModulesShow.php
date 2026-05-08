<?php

namespace App\Livewire\Modules;

use Livewire\Attributes\Layout;
use App\Models\UserModuleProgress;
use Livewire\Component;
use App\Models\Classroom as ClassroomModel;

class ModulesShow extends Component
{
    public $module;
    public $history = [];
    public $historyRecord = false;

    public $lulus = false;
    public $gagal = false;


    public function mount($slug, $moduleSlug)
    {
        $this->module = ClassroomModel::where('slug', $slug)
            ->firstOrFail()
            ->modules()
            ->with([
                'material',   // module_materials
                'test',       // module_tests
                'pages' => fn($q) => $q->orderBy('position'),
            ])
            ->where('slug', $moduleSlug)
            ->firstOrFail();

        $user = auth()->user();

        $this->history = UserModuleProgress::where('user_id', $user->id)
            ->where('module_id', $this->module->id)
            ->latest()
            ->get();

        $this->historyRecord = $this->history->count() > 0;
        // if ($this->historyRecord) {
        //     $latestScore = $this->history->first()->score ?? 0;

        //     // TEST
        //     if ($this->module->type !== 'materi') {

        //         $kkm = $this->module->test?->minimum_pass_score ?? 70;

        //         $this->lulus = $latestScore >= $kkm;
        //         $this->gagal = $latestScore < $kkm;
        //     } else {
        //         // MATERI default 70
        //         $this->lulus = $latestScore >= 70;
        //         $this->gagal = $latestScore < 70;
        //     }
        // }
        if ($this->historyRecord) {

            $minimumScore = $this->module->type !== 'materi'
                ? ($this->module->test?->minimum_pass_score ?? 70)
                : 70;

            // ✅ TRUE if ANY attempt passed
            $hasPassed = $this->history
                ->contains(fn($item) => $item->score >= $minimumScore);

            $this->lulus = $hasPassed;

            // ✅ Failed only if there is history but never passed
            $this->gagal = !$hasPassed;
        }
    }
    public function render()
    {
        return view('livewire.modules.modules-show')->layout('layouts.app', [
            'showNavbar' => false,
            'module' => $this->module,
            'showProgressBar' => true,
            'header' => [
                'title' => 'Detail Modul',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50,
                'mode' => $this->module->type === 'materi' ? 'MATERI' : 'TEST',
                'totalPages' => count($this->module->pages),
                'endTime' => null,
                'duration' => $this->module->test?->time_limit_minutes
            ]
        ]);
    }
}
