<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CardSkill extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $src,
        public bool $hasNoColor = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.card-skill');
    }
}
