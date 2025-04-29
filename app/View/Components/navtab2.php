<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navtab2 extends Component
{
    /**
     * Create a new component instance.
     */
    public $navtabheader = [];
    public function __construct($navtabheader)
    {
        $this->navtabheader = $navtabheader;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navtab2');
    }
}
