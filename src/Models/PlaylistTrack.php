<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class PlaylistTrack extends AbstractModel
{
    public function __construct(
        public readonly string $added_at,
        public readonly User $added_by,
        public readonly bool $is_local,
        public readonly Track $track,
    ) {}
}
