<?php

namespace App\View\Components\ui\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttonfilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.button.button-filter');
    }
}
