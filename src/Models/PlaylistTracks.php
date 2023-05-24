<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class PlaylistTracks extends AbstractModel
{
    public function __construct(
        public readonly string $href,
        public readonly int $total,
    ) {}
}
