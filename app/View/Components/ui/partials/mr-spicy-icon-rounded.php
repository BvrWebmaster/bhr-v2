<?php

namespace App\View\Components\ui\partials;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mr-spicy-icon-rounded extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.partials.mr-spicy-icon-rounded');
    }
}
