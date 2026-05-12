<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classroom;
use App\Models\UserModuleProgress;

class Leaderboard extends Component
{
    public $classroom;
    public $leaderboard = [];
    public $moduleCount; // add this

    public function mount($slug)
    {
        $this->classroom = Classroom::where('slug', $slug)
            ->firstOrFail();

        $this->moduleCount = $this->classroom->modules()->count(); // add this

        /*
        |--------------------------------------------------------------------------
        | Get progresses ONLY from this classroom
        |--------------------------------------------------------------------------
        */

        $progresses = UserModuleProgress::with([
            'user',
            'module'
        ])
            ->where('is_completed', true)
            ->whereHas('module', function ($q) {
                $q->where('classroom_id', $this->classroom->id);
            })
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Group by user
        |--------------------------------------------------------------------------
        */

        $users = $progresses->groupBy('user_id');

        $leaderboard = [];

        foreach ($users as $userId => $records) {

            /*
            |--------------------------------------------------------------------------
            | Best score per module
            |--------------------------------------------------------------------------
            */

            $bestPerModule = $records
                ->groupBy('module_id')
                ->map(function ($moduleRecords) {

                    return $moduleRecords
                        ->sortByDesc('score')
                        ->first();
                });

            /*
            |--------------------------------------------------------------------------
            | Completion count
            |--------------------------------------------------------------------------
            */

            $completionCount = $bestPerModule->count();

            /*
            |--------------------------------------------------------------------------
            | Average score
            |--------------------------------------------------------------------------
            */

            $averageScore = round(
                $bestPerModule->avg('score'),
                2
            );

            /*
            |--------------------------------------------------------------------------
            | Earliest completion
            |--------------------------------------------------------------------------
            */

            $firstFinish = $bestPerModule
                ->sortBy('created_at')
                ->first()
                ?->created_at;

            $leaderboard[] = (object) [
                'user' => $records->first()->user,
                'completion_count' => $completionCount,
                'average_score' => $averageScore,
                'submitted_at' => $firstFinish,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | SORTING
        |--------------------------------------------------------------------------
        */

        usort($leaderboard, function ($a, $b) {

            /*
            |--------------------------------------------------------------------------
            | Priority 1
            | Completion count DESC
            |--------------------------------------------------------------------------
            */

            if ($a->completion_count > $b->completion_count) {
                return -1;
            }

            if ($a->completion_count < $b->completion_count) {
                return 1;
            }

            /*
            |--------------------------------------------------------------------------
            | Priority 2
            | Average score DESC
            |--------------------------------------------------------------------------
            */

            if ($a->average_score > $b->average_score) {
                return -1;
            }

            if ($a->average_score < $b->average_score) {
                return 1;
            }

            /*
            |--------------------------------------------------------------------------
            | Priority 3
            | Earlier submit ASC
            |--------------------------------------------------------------------------
            */

            return strtotime($a->submitted_at)
                <=> strtotime($b->submitted_at);
        });

        /*
        |--------------------------------------------------------------------------
        | Assign rank
        |--------------------------------------------------------------------------
        */

        foreach ($leaderboard as $index => $player) {

            $player->rank = $index + 1;

            $player->isCurrentUser =
                auth()->id() === $player->user->id;
        }

        $this->leaderboard = $leaderboard;
    }

    public function render()
    {
        return view('livewire.leaderboard')->layout('layouts.app', [
            'header' => [
                'title' => 'Ranking',
                'level' => 19,
                'rank' => 1,
                'xp'   => 50
            ]
        ]);
    }
}
