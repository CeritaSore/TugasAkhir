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
    public $cardTitle;
    public $cardSubtitle;
    public $cardIcon;
    public function __construct($cardTitle, $cardSubtitle, $cardIcon)
    {
        $this->cardTitle = $cardTitle;
        $this->cardSubtitle = $cardSubtitle;
        $this->cardIcon = $cardIcon;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
