<?php

namespace App\View\Components\ui\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class imagespanelmobile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $images
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..ui.modal.images-panel-mobile');
    }
}
