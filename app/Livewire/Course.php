<?php

namespace App\Livewire;

use Livewire\Component;

class Course extends Component
{
    public $data = [
        'nama_kelas' => 'Matematika Diskrit I',
        'deskripsi' => 'Pelajaran tentang logika, himpunan, relasi, fungsi, dan teori graf, yang berfokus pada konsep-konsep diskrit, terutama dalam ilmu komputer dan teknologi informasi.',
        'level' => 'mudah',
        'status' => 'aktif',
        'kode_kelas' => 'MD101',
    ];
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
    }
    public function render()
    {
        return view('livewire.course')
            ->layout('layouts.app', ['title' => 'Course']);
    }
}
