<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class RecentlyPlayedTrack extends Data
{
    public function __construct(
        public readonly Track $track,
        public readonly string $played_at,
        public readonly Context $context,
    ) {}
}
