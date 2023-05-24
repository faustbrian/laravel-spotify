<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class RecentlyPlayedTracks extends Data
{
    public function __construct(
        public string $href,
        public int $limit,
        public ?string $next,
        public Cursors $cursors,
        public int $total,
        #[DataCollectionOf(Track::class)]
        public array $items,
    ) {}
}
