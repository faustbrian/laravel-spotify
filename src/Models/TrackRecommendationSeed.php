<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class TrackRecommendationSeed extends Data
{
    public function __construct(
        public readonly int $afterFilteringSize,
        public readonly int $afterRelinkingSize,
        public readonly string $href,
        public readonly string $id,
        public readonly int $initialPoolSize,
        public readonly string $type,
    ) {}
}
