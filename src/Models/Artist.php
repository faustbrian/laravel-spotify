<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class Artist extends AbstractModel
{
    public function __construct(
        public readonly ExternalUrls $external_urls,
        public readonly ?Follower $followers,
        public readonly ?array $genres,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly ?DataCollection $images,
        public readonly string $name,
        public readonly ?int $popularity,
        public readonly string $type,
        public readonly string $uri,
    ) {}
}
