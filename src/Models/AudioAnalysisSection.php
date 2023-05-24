<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisSection extends Data
{
    public function __construct(
        public readonly float $start,
        public readonly float $duration,
        public readonly float $confidence,
        public readonly float $loudness,
        public readonly float $tempo,
        public readonly float $tempo_confidence,
        public readonly int $key,
        public readonly float $key_confidence,
        public readonly int $mode,
        public readonly float $mode_confidence,
        public readonly int $time_signature,
        public readonly float $time_signature_confidence,
    ) {}
}
