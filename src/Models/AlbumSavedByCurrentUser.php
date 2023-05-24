<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class AlbumSavedByCurrentUser extends AbstractModel
{
    public function __construct(
        public readonly string $added_at,
        public readonly Album $album,
    ) {}
}