<?php

namespace App\Livewire\Modules;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Classroom as ClassroomModel;

class ModulesShow extends Component
{
    public $module;
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
                'mode' => 'MATERI'
            ]
        ]);
    }
}
