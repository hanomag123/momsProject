<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */

    public $pages;
    public $cur;

    public function __construct($pages = [], $cur = '')
    {
        $this->pages = $pages;
        $this->cur = $cur;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}
