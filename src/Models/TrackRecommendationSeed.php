<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class TrackRecommendationSeed extends AbstractModel
{
    public function __construct(
        public int $afterFilteringSize,
        public int $afterRelinkingSize,
        public string $href,
        public string $id,
        public int $initialPoolSize,
        public string $type,
    ) {}
}
