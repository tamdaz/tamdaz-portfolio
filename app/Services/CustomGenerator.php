<?php

namespace App\Services;

use Orchid\Attachment\Engines\Generator;

class CustomGenerator extends Generator
{
    public function name(): string
    {
        return explode('.', $this->file->getClientOriginalName())[0];
    }

    public function fullName(): string
    {
        return $this->name().'.'.$this->extension();
    }
}
