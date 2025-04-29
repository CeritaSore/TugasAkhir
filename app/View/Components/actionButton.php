<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class actionButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $actionlink;
    public $actionModalTarget;
    public $actionModalTitle;
    public function __construct($actionlink, $actionModalTarget, $actionModalTitle)
    {
        $this->actionlink = $actionlink;
        $this->actionModalTarget = $actionModalTarget;
        $this->actionModalTitle = $actionModalTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.actionbutton');
    }
}
