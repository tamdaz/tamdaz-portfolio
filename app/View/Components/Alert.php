<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'info',
        public string $primary = '',
        public string $secondary = ''
    ) {
    }

    public function getIcon(string $icon): string
    {
        return match ($icon) {
            'info' => 'info',
            'success' => 'check',
            'warn', 'warning' => 'warning',
            'error' => 'error',
            'debug' => 'construction'
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.alert');
    }
}
