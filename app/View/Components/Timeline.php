<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Timeline extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array<\App\Models\Timeline>  $periods
     */
    public function __construct(
        public array $periods
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
