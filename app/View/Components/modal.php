<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $modalTitle;
    public $modalId;
    public function __construct($modalId, $modalTitle)
    {
        $this->modalId = $modalId;
        $this->modalTitle = $modalTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
