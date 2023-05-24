<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class ExternalIds extends Data
{
    public function __construct(
        public readonly string $isrc,
        public readonly string $ean,
        public readonly string $upc,
    ) {}
}
