<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisTatum extends Data
{
    public function __construct(
        public readonly float $start,
        public readonly float $duration,
        public readonly float $confidence,
    ) {}
}
