<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public string $mode = 'materi';
    // Kelas | materi-detail | quiz | result

    public array $data = [];

    protected $listeners = ['setHeader'];

    public function setHeader($mode, $data = [])
    {
        $this->mode = $mode;
        $this->data = $data;
        // data bisa berisi title, subtitle, dll tergantung mode
    }

    // Variable color based on level
    protected function levelToColorVarProperty(int $level): string
    {
        $level = $this->data['level'] ?? 1;

        return match (true) {
            $level <= 5  => 'var(--color-primary-100)',
            $level <= 10 => 'var(--color-primary-200)',
            $level <= 15 => 'var(--color-primary-300)',
            $level <= 20 => 'var(--color-primary-400)',
            $level <= 25 => 'var(--color-warning-300)',
            $level <= 30 => 'var(--color-additional-bronze)',
            $level <= 999 => 'var(--color-danger-300)',
            default     => 'var(--color-neutral-400)',
        };
    }

    // Class color based on level
    protected function levelToColorClassProperty(int $level): string
    {
        $level = $this->data['level'] ?? 1;

        return match (true) {
            $level <= 5  => 'bg-primary-100',
            $level <= 10 => 'bg-primary-200',
            $level <= 15 => 'bg-primary-300',
            $level <= 20 => 'bg-primary-400',
            $level <= 25 => 'bg-warning-300',
            $level <= 30 => 'bg-additional-bronze',
            $level <= 999 => 'bg-danger-300',
            default     => 'bg-neutral-400',
        };
    }

    public function getLevelColorVarProperty()
    {
        return $this->levelToColorVarProperty($this->data['level'] ?? 20);
    }
    public function getLevelColorClassProperty()
    {
        return $this->levelToColorClassProperty($this->data['level'] ?? 20);
    }

    // Formatted Rank
    public function getFormattedRankDataProperty(): array
    {
        $rank = $this->data['rank'] ?? null;

        if (!$rank || !is_numeric($rank)) {
            return [
                'text'  => 'No Rank',
                'color' => 'bg-neutral-400',
                'colorVar' => 'var(--color-neutral-400)',
            ];
        }

        $rank = (int) $rank;

        // suffix logic
        if ($rank % 100 >= 11 && $rank % 100 <= 13) {
            $suffix = 'th';
        } else {
            $suffix = match ($rank % 10) {
                1 => 'st',
                2 => 'nd',
                3 => 'rd',
                default => 'th',
            };
        }

        // color logic
        $color = match ($rank) {
            1 => 'text-additional-gold',
            2 => 'text-additional-silver',
            3 => 'text-additional-bronze',
            default => 'text-neutral-400',
        };

        // color variable logic\
        $colorVar = match ($rank) {
            1 => 'var(--color-additional-gold)',
            2 => 'var(--color-additional-silver)',
            3 => 'var(--color-additional-bronze)',
            default => 'var(--color-neutral-400)',
        };

        return [
            'text'  => "{$rank}{$suffix} Rank",
            'color' => $color,
            'colorVar' => $colorVar,
        ];
    }

    public function render()
    {
        return view('livewire.header');
    }
}
