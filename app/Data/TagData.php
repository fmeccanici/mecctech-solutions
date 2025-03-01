<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TagData extends Data
{
    public function __construct(
        public string $name,
        public bool $visible = false,
    ) {}
}
