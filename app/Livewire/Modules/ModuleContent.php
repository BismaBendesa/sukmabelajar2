<?php

namespace App\Livewire\Modules;

use App\Models\Classroom;
use App\Models\Page;
use Livewire\Component;

class ModuleContent extends Component
{
    public $module;
    public $pages = [];
    public $raguRagu = [];
    public $currentPageIndex = 0;

    public $selectedAnswer = null;
    public $showExplanation = false;
    public $isCorrect = null;

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
    }

    public function prev()
    {
        if ($this->currentPageIndex > 0) {
            $this->resetState();
            $this->currentPageIndex--;
        }
    }

    public function submitAnswer()
    {
        $page = $this->page;

        if ($page['type'] !== 'question') return;

        $question = $page['question'];

        $correct = collect($question['options'])
            ->firstWhere('is_correct', true);

        $this->isCorrect = $correct && $correct['id'] == $this->selectedAnswer;

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

    private function resetState()
    {
        $this->selectedAnswer = null;
        $this->showExplanation = false;
        $this->isCorrect = null;
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
                'mode' => 'MATERI' // will have logic here if Materi and If test
            ]
        ]);
    }
}
