<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Artist extends Data
{
    public function __construct(
        public ExternalUrls $external_urls,
        public Follower $followers,
        public array $genres,
        public string $href,
        public string $id,
        #[DataCollectionOf(Image::class)]
        public array $images,
        public string $name,
        public int $popularity,
        public string $type,
        public string $uri,
    ) {}
}
