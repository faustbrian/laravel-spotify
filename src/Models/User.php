<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class User extends AbstractModel
{
    public function __construct(
        public readonly ?string $display_name,
        public readonly ExternalUrls $external_urls,
        public readonly Follower $followers,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly ?DataCollection $images,
        public readonly string $type,
        public readonly string $uri,
    ) {}
}
