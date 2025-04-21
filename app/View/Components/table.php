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
    public $tableHeaders;
    public $tableTitle;
    public $modalId;
    public function __construct($tableHeaders = [], $tableTitle = '', $modalId = '')
    {
        $this->tableHeaders = $tableHeaders;
        $this->tableTitle = $tableTitle;
        $this->modalId = $modalId;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
