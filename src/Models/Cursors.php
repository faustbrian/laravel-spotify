<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Cursors extends Data
{
    public function __construct(
        public readonly string $after,
        public readonly string $before,
    ) {}
}
