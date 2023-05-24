<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioFeature extends Data
{
    public function __construct(
        public readonly float $acousticness,
        public readonly string $analysis_url,
        public readonly float $danceability,
        public readonly int $duration_ms,
        public readonly float $energy,
        public readonly string $id,
        public readonly float $instrumentalness,
        public readonly int $key,
        public readonly float $liveness,
        public readonly float $loudness,
        public readonly int $mode,
        public readonly float $speechiness,
        public readonly float $tempo,
        public readonly int $time_signature,
        public readonly string $track_href,
        public readonly string $type,
        public readonly string $uri,
        public readonly float $valence,
    ) {}
}
