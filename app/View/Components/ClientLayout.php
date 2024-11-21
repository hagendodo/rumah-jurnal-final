<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $searchbar = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('layouts.client');
    }
}
