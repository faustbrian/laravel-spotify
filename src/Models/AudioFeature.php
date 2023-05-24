<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class AudioFeature extends AbstractModel
{
    public function __construct(
        public float $acousticness,
        public string $analysis_url,
        public float $danceability,
        public int $duration_ms,
        public float $energy,
        public string $id,
        public float $instrumentalness,
        public int $key,
        public float $liveness,
        public float $loudness,
        public int $mode,
        public float $speechiness,
        public float $tempo,
        public int $time_signature,
        public string $track_href,
        public string $type,
        public string $uri,
        public float $valence,
    ) {}
}
