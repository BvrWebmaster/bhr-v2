<?php

namespace App\View\Components\ui\label;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headercheckboxfilter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $title
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.label.header-checkbox-filter');
    }
}
