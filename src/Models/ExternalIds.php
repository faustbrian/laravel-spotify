<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class ExternalIds extends Data
{
    public function __construct(
        public string $isrc,
        public string $ean,
        public string $upc,
    ) {}
}
