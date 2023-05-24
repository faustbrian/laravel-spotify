<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class UserFollowedArtists extends AbstractModel
{
    public function __construct(
        public readonly string $href,
        public readonly int $limit,
        public readonly ?string $next,
        public readonly Cursors $cursors,
        public readonly int $total,
        #[DataCollectionOf(Artist::class)]
        public readonly DataCollection $items,
    ) {}
}
