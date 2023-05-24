<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Category extends Data
{
    public function __construct(
        public string $href,
        #[DataCollectionOf(Icon::class)]
        public array $icons,
        public string $id,
        public string $name,
    ) {}
}
