<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Category extends Data
{
    public function __construct(
        public readonly string $href,
        #[DataCollectionOf(Icon::class)]
        public readonly DataCollection $icons,
        public readonly string $id,
        public readonly string $name,
    ) {}
}
