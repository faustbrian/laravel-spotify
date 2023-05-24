<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Copyright extends Data
{
    public function __construct(
        public string $text,
        public string $type,
    ) {}
}
