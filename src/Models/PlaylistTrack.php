<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class PlaylistTrack extends Data
{
    public string $added_at;

    public PublicUser $added_by;

    public bool $is_local;

    public Track $track;
}
