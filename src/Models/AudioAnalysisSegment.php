<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisSegment extends Data
{
    public function __construct(
        public readonly float $start,
        public readonly float $duration,
        public readonly float $confidence,
        public readonly float $loudness_start,
        public readonly float $loudness_max,
        public readonly float $loudness_max_time,
        public readonly float $loudness_end,
        public readonly array $pitches,
        public readonly array $timbre,
    ) {}
}
