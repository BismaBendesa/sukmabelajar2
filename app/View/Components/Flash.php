<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flash extends Component
{
    /**
     * Create a new component instance.
     */
    public string $type;
    public int $timeout;

    public function __construct(string $type = 'success', int $timeout = 2000)
    {
        $this->type = $type;
        $this->timeout = $timeout;
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        return view('components.flash');
    }
}
