<?php

namespace App\View\Components\ui\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class accomodationscard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $location,
        public $facilities
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.card.accomodations-card');
    }
}
