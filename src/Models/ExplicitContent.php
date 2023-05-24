<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class ExplicitContent extends Data
{
    public function __construct(
        public readonly bool $filter_enabled,
        public readonly bool $filter_locked,
    ) {}
}
