<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class CurrentlyPlayingAndQueue extends Data
{
    public function __construct(
        public Track $currently_playing,
        #[DataCollectionOf(Track::class)]
        public array $queue,
    ) {}
}
