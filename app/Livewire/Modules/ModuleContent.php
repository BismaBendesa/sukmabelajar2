<?php

namespace App\Livewire\Modules;

use App\Models\Classroom;
use App\Models\Page;
use App\Models\UserAnswer;
use App\Models\UserModuleProgress;
use Carbon\Carbon;
use Livewire\Component;


class ModuleContent extends Component
{
    public $module;
    public $attempt;
    public $progressId;
    public $pages = [];
    public $raguRagu = [];
    public $answers = []; // Menyimpan jawaban untuk semua pertanyaan
    public $currentPageIndex = 0;

    public $selectedAnswer = null;
    public $showExplanation = false;
    public $isCorrect = null;
    public $confirmSubmit = false;

    public function mount($slug, $moduleSlug)
    {
        $this->module = Classroom::where('slug', $slug)
            ->firstOrFail()
            ->modules()
            ->with([
                'pages' => fn($q) => $q->orderBy('position'),
                'pages.blocks' => fn($q) => $q->orderBy('position'),
                'pages.question.options'
            ])
            ->where('slug', $moduleSlug)
            ->firstOrFail();

        $this->pages = $this->module->pages->values()->toArray();

        $user = auth()->user();

        $progress = UserModuleProgress::where('user_id', $user->id)
            ->where('module_id', $this->module->id)
            ->where('is_completed', false)
            ->latest()
            ->first();

        if (!$progress) {
            $progress = UserModuleProgress::create([
                'user_id' => $user->id,
                'module_id' => $this->module->id,
            ]);
        }

        $this->progressId = $progress->id;

        // // 🔥 Try get from session first
        // $progressId = session('progress_' . $this->module->id);

        // if ($progressId) {
        //     $this->progressId = $progressId;
        // } else {
        //     $progress = UserModuleProgress::create([
        //         'user_id' => $user->id,
        //         'module_id' => $this->module->id,
        //         'score' => null,
        //         'is_completed' => false,
        //     ]);

        //     $this->progressId = $progress->id;

        //     session([
        //         'progress_' . $this->module->id => $this->progressId
        //     ]);
        // }

        // if ($this->module->type !== 'materi') {
        //     $timeLimit = $this->module->test?->time_limit_minutes;
        //     $hasAttempt = session()->has('module_attempt_' . $this->module->id);
        //     $hasTimer   = session()->has('test_end_time_' . $this->module->id);


        //     if ($timeLimit) {
        //         if (!session()->has('test_end_time_' . $this->module->id)) {
        //             $endTime = Carbon::now()->addMinutes($timeLimit);

        //             session([
        //                 'test_end_time_' . $this->module->id => $endTime->timestamp
        //             ]);
        //         }
        //     }
        //     if (!$hasAttempt) {
        //         return redirect()->route('modules.show', [
        //             'slug' => $this->module->classroom->slug,
        //             'moduleSlug' => $this->module->slug
        //         ])->with('error', 'Kamu sudah menghabiskan kesempatan untuk mengerjakan tes ini.');
        //     }
        // }

        // // Tracking attempt in session (optional, can be removed if not needed)
        // $this->attempt = session('module_attempt_' . $this->module->id)
        //     ?? UserModuleProgress::where('user_id', auth()->id())
        //     ->where('module_id', $this->module->id)
        //     ->count() + 1;

        // session([
        //     'module_attempt_' . $this->module->id => $this->attempt
        // ]);
    }

    // Only for non material navigation
    public function goToPage($targetId)
    {
        // Find the array index where the 'id' matches the clicked targetId
        foreach ($this->pages as $index => $p) {
            if ($p['id'] == $targetId) {
                $this->resetState(); // Reset answers/explanations
                $this->currentPageIndex = $index;
                return;
            }
        }
    }


    public function getPageProperty()
    {
        return $this->pages[$this->currentPageIndex] ?? null;
    }

    public function next()
    {
        if ($this->currentPageIndex < count($this->pages) - 1) {
            $this->resetState();
            $this->currentPageIndex++;
        }
        $this->dispatch(
            'update-header-pages',
            currentPage: $this->currentPageIndex + 1,
            totalPages: count($this->pages)
        );
    }

    public function prev()
    {
        if ($this->currentPageIndex > 0) {
            $this->resetState();
            $this->currentPageIndex--;
        }
        $this->dispatch(
            'update-header-pages',
            currentPage: $this->currentPageIndex + 1,
            totalPages: count($this->pages)
        );
    }

    public function submitAnswer()
    {
        if (!$this->selectedAnswer) return; // 🔥 IMPORTANT
        $page = $this->page;

        if ($page['type'] !== 'question') return;

        $question = $page['question'];

        $correct = collect($question['options'])
            ->firstWhere('is_correct', true);

        $this->isCorrect = $correct && $correct['id'] == $this->selectedAnswer;

        // ✅ IMPORTANT FIX: sync to answers array
        $this->answers[$page['id']] = $this->selectedAnswer;

        // ✅ SAVE ANSWER LINKED TO PROGRESS
        UserAnswer::updateOrCreate(
            [
                'user_module_progress_id' => $this->progressId,
                'question_id' => $question['id'],
            ],
            [
                'user_id' => auth()->id(),
                'answer' => $this->selectedAnswer,
                'is_correct' => $this->isCorrect,
            ]
        );

        $this->showExplanation = true;
    }
    public function toggleRaguRagu($questionId)
    {
        if (in_array($questionId, $this->raguRagu)) {
            // Jika sudah ada, hapus (uncheck)
            $this->raguRagu = array_diff($this->raguRagu, [$questionId]);
        } else {
            // Jika belum ada, tambahkan
            $this->raguRagu[] = $questionId;
        }
    }

    // untuk progress bar di header
    // public function updatedAnswers()
    // {
    //     // Hitung progres
    //     $total = count($this->allQuestions);
    //     $answered = collect($this->answers)->filter()->count();
    //     $percentage = ($answered / $total) * 100;

    //     // Kirim event ke komponen lain
    //     $this->dispatch('update-progress', progress: $percentage);
    // }

    private function resetState()
    {
        $this->selectedAnswer = null;
        $this->showExplanation = false;
        $this->isCorrect = null;
    }

    public function isLastPage()
    {
        return $this->currentPageIndex === count($this->pages) - 1;
    }

    // public function finish()
    // {
    //     // OPTIONAL: prevent finishing test if unanswered
    //     if ($this->module->type !== 'materi') {
    //         $questionPages = collect($this->pages)->where('type', 'question');

    //         foreach ($questionPages as $page) {
    //             if (!isset($this->answers[$page['id']])) {
    //                 session()->flash('error', 'Masih ada soal yang belum dijawab.');
    //                 return;
    //             }
    //         }
    //     }

    //     return redirect()->route('module.result', [
    //         'slug' => $this->module->classroom->slug,
    //         'moduleSlug' => $this->module->slug,
    //     ]);
    // }

    // public function finishModule()
    // {
    //     $user = auth()->user();

    //     // Get all question IDs in this module
    //     $questionIds = collect($this->pages)
    //         ->where('type', 'question')
    //         ->pluck('question.id')
    //         ->toArray();

    //     // Get user answers
    //     $answers = \App\Models\UserAnswer::where('user_id', $user->id)
    //         ->whereIn('question_id', $questionIds)
    //         ->get();

    //     $total = count($questionIds);
    //     $correct = $answers->where('is_correct', true)->count();

    //     $score = $total > 0 ? round(($correct / $total) * 100) : 0;

    //     $attempt = session('module_attempt_' . $this->module->id)
    //         ?? UserModuleProgress::where('user_id', $user->id)
    //         ->where('module_id', $this->module->id)
    //         ->count() + 1;

    //     // Save progress
    //     \App\Models\UserModuleProgress::updateOrCreate(
    //         [
    //             'user_id' => $user->id,
    //             'module_id' => $this->module->id
    //         ],
    //         [
    //             'score' => $score,
    //             'is_completed' => true
    //         ]
    //     );

    //     // Redirect to result page
    //     return redirect()->route('module.result', [
    //         'slug' => $this->module->classroom->slug,
    //         'moduleSlug' => $this->module->slug
    //     ]);
    // }

    // public function finishModule()
    // {
    //     $user = auth()->user();

    //     // 1. Get all question IDs
    //     $questionIds = collect($this->pages)
    //         ->where('type', 'question')
    //         ->pluck('question.id')
    //         ->toArray();

    //     // 2. Get user answers
    //     $answers = UserAnswer::where('user_module_progress_id', $this->progressId)
    //         ->whereIn('question_id', $questionIds)
    //         ->get();

    //     $total = count($questionIds);
    //     // $correct = $answers->where('is_correct', true)->count();
    //     // Count correct answers 
    //     $correct = $answers->where('is_correct', true)->count();

    //     $score = $total > 0 ? round(($correct / $total) * 100) : 0;

    //     // handling no answers at all
    //     if ($answers->isEmpty()) {
    //         $score = 0;
    //     }
    //     // ✅ UPDATE CURRENT ATTEMPT
    //     UserModuleProgress::where('id', $this->progressId)
    //         ->update([
    //             'score' => $score,
    //             'is_completed' => true
    //         ]);



    //     $progress = UserModuleProgress::where('user_id', auth()->id())
    //         ->where('module_id', $this->module->id)
    //         ->latest()
    //         ->first();

    //     // ✅ CLEAR SESSION
    //     session()->forget('progress_id_' . $this->module->id);

    //     if ($progress && $progress->is_completed) {
    //         return redirect()->route('modules.result', [
    //             'slug' => $this->module->classroom->slug,
    //             'moduleSlug' => $this->module->slug
    //         ]);
    //     }

    //     // 6. Redirect
    //     return redirect()->route('modules.result', [
    //         'slug' => $this->module->classroom->slug,
    //         'moduleSlug' => $this->module->slug
    //     ]);
    // }

    // // Proceed with caution, I don't know if this is error or not
    // public function updatedAnswers($value, $key)
    // {
    //     // $key format: answers.{page_id}
    //     $pageId = str_replace('answers.', '', $key);

    //     $page = collect($this->pages)->firstWhere('id', $pageId);

    //     if (!$page || $page['type'] !== 'question') return;

    //     $question = $page['question'];

    //     $correctOption = collect($question['options'])
    //         ->firstWhere('is_correct', true);

    //     $isCorrect = $correctOption && $correctOption['id'] == $value;

    //     // ✅ SAVE ANSWER LINKED TO PROGRESS
    //     UserAnswer::updateOrCreate(
    //         [
    //             'user_module_progress_id' => $this->progressId,
    //             'question_id' => $question['id'],
    //         ],
    //         [
    //             'user_id' => auth()->id(),
    //             'answer' => $this->selectedAnswer,
    //             'is_correct' => $isCorrect,
    //         ]
    //     );
    // }

    public function finishModule()
    {
        $user = auth()->user();

        // ✅ Count unanswered questions
        $unanswered = collect($this->pages)
            ->where('type', 'question')
            ->filter(fn($p) => !isset($this->answers[$p['id']]))
            ->count();

        // // 🚨 If there are unanswered questions, ask confirmation
        // if ($unanswered > 0 && !$this->confirmSubmit) {
        //     $this->dispatch('confirm-submit', unanswered: $unanswered);
        //     return;
        // }

        $questionPages = collect($this->pages)
            ->where('type', 'question');

        $total = collect($this->pages)
            ->where('type', 'question')
            ->count();
        $correct = 0;

        foreach ($questionPages as $page) {
            $question = $page['question'];
            $selected = $this->answers[$page['id']] ?? null;

            if (!$selected) continue; // skip unanswered

            $correctOption = collect($question['options'])
                ->firstWhere('is_correct', true);

            $isCorrect = $correctOption && $correctOption['id'] == $selected;

            if ($isCorrect) $correct++;

            // ✅ Save answer safely
            UserAnswer::updateOrCreate(
                [
                    'user_module_progress_id' => $this->progressId,
                    'question_id' => $question['id'],
                ],
                [
                    'user_id' => $user->id,
                    'answer' => $selected,
                    'is_correct' => $isCorrect,
                ]
            );
        }

        $score = $total > 0 ? round(($correct / $total) * 100) : 0;

        \App\Models\UserModuleProgress::where('id', $this->progressId)
            ->update([
                'score' => $score,
                'is_completed' => true
            ]);

        return redirect()->route('modules.result', [
            'slug' => $this->module->classroom->slug,
            'moduleSlug' => $this->module->slug
        ]);
    }

    protected $listeners = ['confirmSubmit'];

    public function confirmSubmit()
    {
        $this->confirmSubmit = true;
        $this->finishModule(); // re-run after confirmation
    }

    public function render()
    {
        return view('livewire.modules.module-content')->layout('layouts.app', [
            'showNavbar' => false,
            'module' => $this->module,
            'showProgressBar' => true,
            'header' => [
                'title' => $this->module->title,
                'level' => 19,
                'rank' => 1,
                'xp'   => 50,
                'mode' => $this->module->type === 'materi' ? 'MATERI' : 'TEST', // will have logic here if Materi and If test
                'currentPage' => $this->currentPageIndex + 1,
                'totalPages' => count($this->pages),
                'endTime' => session('test_end_time_' . $this->module->id),
            ]
        ]);
    }
}
