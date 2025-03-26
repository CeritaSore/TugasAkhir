<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     */
    public $cardtitle;
    public $cardbody;
    public $icon;
    public function __construct($cardtitle, $cardbody,$icon)
    {
        //
        $this->cardtitle = $cardtitle;
        $this->cardbody = $cardbody;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
