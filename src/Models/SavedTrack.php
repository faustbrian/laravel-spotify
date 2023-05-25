<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class SavedTrack extends Data
{
    public string $added_at;

    public Track $track;
}
