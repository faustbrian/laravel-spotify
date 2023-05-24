<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class AudiobookSearchResponse extends AbstractModel
{
    public function __construct(
        public readonly string $href,
        public readonly int $limit,
        public readonly string $next,
        public readonly int $offset,
        public readonly ?string $previous,
        public readonly int $total,
        #[DataCollectionOf(Audiobook::class)]
        public readonly DataCollection $items,
    ) {}
}
