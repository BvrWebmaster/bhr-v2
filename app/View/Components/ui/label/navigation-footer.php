<?php

namespace App\View\Components\ui\label;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navigationfooter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $routes
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.label.navigation-footer');
    }
}
