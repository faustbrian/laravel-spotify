<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Icon extends Data
{
    public function __construct(
        public ?int $height,
        public string $url,
        public ?int $width,
    ) {}
}
