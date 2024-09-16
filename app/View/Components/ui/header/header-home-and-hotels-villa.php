<?php

namespace App\View\Components\ui\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class headerhomeandhotelsvilla extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $showSearching
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.header.header-home-and-hotels-villa');
    }
}
