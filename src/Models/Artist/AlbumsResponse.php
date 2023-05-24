<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models\Artist;

use BombenProdukt\Spotify\Models\AbstractModel;
use BombenProdukt\Spotify\Models\Album;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class AlbumsResponse extends AbstractModel
{
    public function __construct(
        public readonly string $href,
        public readonly int $limit,
        public readonly string $next,
        public readonly int $offset,
        public readonly string $previous,
        public readonly int $total,
        #[DataCollectionOf(Album::class)]
        public readonly DataCollection $items,
    ) {}
}
