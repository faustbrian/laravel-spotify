<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class EpisodeSavedByCurrentUser extends Data
{
    public function __construct(
        public readonly string $added_at,
        public readonly Episode $episode,
    ) {}
}
