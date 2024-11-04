<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class SavedAlbum extends Data
{
    public string $added_at;

    public Album $album;
}
