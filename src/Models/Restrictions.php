<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Restrictions extends Data
{
    public function __construct(
        public string $reason,
    ) {}
}
