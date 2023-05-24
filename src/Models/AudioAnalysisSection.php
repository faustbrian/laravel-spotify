<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisSection extends Data
{
    public function __construct(
        public float $start,
        public float $duration,
        public float $confidence,
        public float $loudness,
        public float $tempo,
        public float $tempo_confidence,
        public int $key,
        public float $key_confidence,
        public int $mode,
        public float $mode_confidence,
        public int $time_signature,
        public float $time_signature_confidence,
    ) {}
}
