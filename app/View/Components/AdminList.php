<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdminList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $lists,
        public string $type,
        public string $primaryName,
        public string $secondaryName,
        public bool $showStatus = true
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-list');
    }
}
