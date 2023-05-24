<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class PlayerQueueResponse extends Data
{
    public function __construct(
        public readonly Track $currently_playing,
        #[DataCollectionOf(Track::class)]
        public readonly DataCollection $queue,
    ) {}
}
