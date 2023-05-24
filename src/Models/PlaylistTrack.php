<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class PlaylistTrack extends Data
{
    public function __construct(
        public readonly string $added_at,
        public readonly User $added_by,
        public readonly bool $is_local,
        public readonly Track $track,
    ) {}
}
