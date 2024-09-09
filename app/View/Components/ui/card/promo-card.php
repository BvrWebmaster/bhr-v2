<?php

namespace App\View\Components\ui\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class promocard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image,
        public string $label
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.card.promo-card');
    }
}
