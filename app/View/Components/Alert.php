<?php

namespace App\View\Components;

use Exception;
use Illuminate\View\Component;
use Illuminate\View\View;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  'info'|'success'|'warn'|'error'|'debug'  $type
     */
    public function __construct(
        public string $type = 'info',
        public string $primary = '',
        public string $secondary = ''
    ) {
    }

    /**
     * @throws Exception
     */
    public function getIcon(string $type): string|Exception
    {
        return match ($type) {
            'info' => 'info',
            'success' => 'check',
            'warn', 'warning' => 'warning',
            'error' => 'error',
            'debug' => 'construction',
            default => throw new Exception('Type not specified'),
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
