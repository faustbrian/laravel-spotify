<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class RecentlyPlayedTrack extends AbstractModel
{
    public function __construct(
        public Track $track,
        public string $played_at,
        public Context $context,
    ) {}
}
