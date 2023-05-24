<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class TrackSavedByCurrentUser extends Data
{
    public function __construct(
        public readonly string $added_at,
        public readonly Track $track,
    ) {}
}
