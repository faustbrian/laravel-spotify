<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Narrator extends Data
{
    public function __construct(
        public readonly string $name,
    ) {}
}
