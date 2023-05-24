<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class PlaylistTracks extends Data
{
    public function __construct(
        public readonly string $href,
        public readonly int $total,
    ) {}
}
