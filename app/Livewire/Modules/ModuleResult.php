<?php

namespace App\Livewire\Modules;

use App\Models\Classroom;
use App\Models\UserAnswer;
use App\Models\UserModuleProgress;
use Livewire\Component;

class ModuleResult extends Component
{
    public $module;
    public $score;
    public $correct;
    public $total;
    public $minimumPassScore = 70;

    public function mount($slug, $moduleSlug)
    {
        $user = auth()->user();
        $this->module = Classroom::where('slug', $slug)
            ->firstOrFail()
            ->modules()
            ->where('slug', $moduleSlug)
            ->firstOrFail();

        $this->loadResult();

        $maxAttempt = $this->module->test?->max_attempt;

        if ($maxAttempt) {
            $attemptCount = UserModuleProgress::where('user_id', $user->id)
                ->where('module_id', $this->module->id)
                ->count();

            if ($attemptCount >= $maxAttempt) {
                session()->flash('error', 'Kesempatan sudah habis');
            }
        }

        $this->minimumPassScore = $this->module->test?->minimum_pass_score ?? 70;
    }

    // public function loadResult()
    // {
    //     $questions = \App\Models\Question::whereHas('page', function ($q) {
    //         $q->where('module_id', $this->module->id);
    //     })->pluck('id');

    //     $progress = UserModuleProgress::where('user_id', auth()->id())
    //         ->where('module_id', $this->module->id)
    //         ->latest()
    //         ->first();

    //     $answers = UserAnswer::where('user_module_progress_id', $progress->id)
    //         ->get();

    //     $this->total = $questions->count();
    //     $this->correct = $answers->where('is_correct', true)->count();

    //     $this->score = $this->total > 0
    //         ? round(($this->correct / $this->total) * 100)
    //         : 0;
    // }
    public function loadResult()
    {
        $progress = UserModuleProgress::where('user_id', auth()->id())
            ->where('module_id', $this->module->id)
            ->latest()
            ->first();

        if (!$progress) {
            $this->total = 0;
            $this->correct = 0;
            $this->score = 0;
            return;
        }

        // ✅ 1. Get ALL question IDs in module
        $questionIds = \App\Models\Question::whereHas('page', function ($q) {
            $q->where('module_id', $this->module->id);
        })->pluck('id');

        // ✅ 2. Get ONLY answers from this attempt
        $answers = UserAnswer::where('user_module_progress_id', $progress->id)
            ->get();

        // ✅ 3. Correct answers
        $this->correct = $answers->where('is_correct', true)->count();

        // ✅ 4. TOTAL = ALL QUESTIONS (not answers)
        $this->total = $questionIds->count();

        // ✅ 5. Score calculation (unanswered = wrong)
        $this->score = $this->total > 0
            ? round(($this->correct / $this->total) * 100)
            : 0;
    }

    public function retry()
    {
        $user = auth()->user();

        $test = $this->module->test; // relation to module_tests

        // 1. Count user attempts
        $attemptCount = UserModuleProgress::where('user_id', $user->id)
            ->where('module_id', $this->module->id)
            ->count();

        // 2. Check max attempt
        if ($test && $attemptCount >= $test->max_attempt) {
            session()->flash('error', 'Kamu sudah mencapai batas maksimum percobaan.');
            return;
        }

        // 3. Get all question IDs
        $questionIds = $this->module->pages
            ->where('type', 'question')
            ->pluck('question.id')
            ->toArray();

        // 4. Delete ONLY answers (keep history)
        $latestProgress = UserModuleProgress::where('user_id', $user->id)
            ->where('module_id', $this->module->id)
            ->latest()
            ->first();

        UserAnswer::where('user_module_progress_id', $latestProgress->id)->delete();

        // 5. Set next attempt
        $nextAttempt = $attemptCount + 1;

        session([
            'module_attempt_' . $this->module->id => $nextAttempt
        ]);

        // just clear session → new attempt will be created
        session()->forget('progress_id_' . $this->module->id);

        // 6. Redirect
        return redirect()->route('modules.show', [
            'slug' => $this->module->classroom->slug,
            'moduleSlug' => $this->module->slug
        ]);
    }

    // public function calculateResult()
    // {
    //     if ($this->module->type === 'materi') {
    //         return $this->finishMateri();
    //     }

    //     return $this->finishTest();
    // }

    // public function finish()
    // {
    //     $this->calculateResult();

    //     return redirect()->route('module.result', [
    //         'slug' => $this->module->classroom->slug,
    //         'moduleSlug' => $this->module->slug,
    //     ]);
    // }

    public function render()
    {
        return view('livewire.modules.module-result')->layout('layouts.app', [
            'showNavbar' => false,
            'module' => $this->module,
            'header' => [
                'title' => 'Hasil',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50,
                'mode' => $this->module->type === 'materi' ? 'MATERI' : 'TEST',
            ]
        ]);
    }
}
