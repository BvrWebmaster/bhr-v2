<?php

namespace App\View\Components\ui\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class guestselect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $idBtnDecrement,
        public string $idBtnIncrement,
        public string $idValue,
        public string $label,
        public string $subLabel
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.partials.guest-select');
    }
}
