<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classroom;

class LeaderboardIndex extends Component
{
    public $classes;

    public function mount()
    {
        $this->classes = Classroom::withCount('modules')
            ->get();
    }

    public function render()
    {
        return view('livewire.leaderboard-index')
            ->layout('layouts.app', [
                'header' => [
                    'title' => 'Leaderboard',
                    'level' => 19,
                    'rank' => 1,
                    'xp' => 50,
                ]
            ]);
    }
}
