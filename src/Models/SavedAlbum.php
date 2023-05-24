<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class SavedAlbum extends Data
{
    public function __construct(
        public string $added_at,
        public Album $album,
    ) {}
}
