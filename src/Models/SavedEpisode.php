<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class SavedEpisode extends Data
{
    public string $added_at;

    public Episode $episode;
}
