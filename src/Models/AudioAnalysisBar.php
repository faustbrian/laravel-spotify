<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisBar extends Data
{
    public function __construct(
        public float $start,
        public float $duration,
        public float $confidence,
    ) {}
}
