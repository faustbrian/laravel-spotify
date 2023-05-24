<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class User extends Data
{
    public function __construct(
        public string $display_name,
        public ExternalUrls $external_urls,
        public Follower $followers,
        public string $href,
        public string $id,
        #[DataCollectionOf(Image::class)]
        public array $images,
        public string $type,
        public string $uri,
    ) {}
}
