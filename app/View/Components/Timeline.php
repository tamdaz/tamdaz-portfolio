<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Timeline extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Collection|array $periods
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.timeline');
    }
}
