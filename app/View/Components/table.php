<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class table extends Component
{
    /**
     * Create a new component instance.
     */
    public $tableTitle;
    public $menu;
    public $items;
    public function __construct($tableTitle, $menu = [], $items = [])
    {
        //
        $this->menu = $menu;
        $this->items = $items;
        $this->tableTitle = $tableTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
