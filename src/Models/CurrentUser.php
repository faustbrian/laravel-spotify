<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class CurrentUser extends Data
{
    public function __construct(
        public readonly string $country,
        public readonly string $display_name,
        public readonly string $email,
        public readonly ExplicitContent $explicit_content,
        public readonly ExternalUrls $external_urls,
        public readonly Follower $followers,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly DataCollection $images,
        public readonly string $product,
        public readonly string $type,
        public readonly string $uri,
    ) {}
}
