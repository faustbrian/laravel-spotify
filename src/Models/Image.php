<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Image extends Data
{
    public function __construct(
        public string $url,
        public int $height,
        public int $width,
    ) {}
}
