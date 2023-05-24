<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class AudioAnalysisBeat extends AbstractModel
{
    public function __construct(
        public float $start,
        public float $duration,
        public float $confidence,
    ) {}
}
