<?php

namespace App\View\Components\ui\label;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cekboxfiltercategoriesaccomodationmobile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $index,
        public string $title
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.label.cekbox-filter-categories-accomodation-mobile');
    }
}
