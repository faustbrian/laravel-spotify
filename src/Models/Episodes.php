<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Episodes extends Data
{
    public function __construct(
        public string $href,
        public int $limit,
        public string $next,
        public int $offset,
        public ?string $previous,
        public int $total,
        #[DataCollectionOf(Episode::class)]
        public array $items,
    ) {}
}
