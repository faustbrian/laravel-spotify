<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Album extends Data
{
    public function __construct(
        public readonly string $album_type,
        public readonly int $total_tracks,
        public readonly array $available_markets,
        public readonly ExternalUrls $external_urls,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly DataCollection $images,
        public readonly string $name,
        public readonly string $release_date,
        public readonly string $release_date_precision,
        public readonly Restrictions $restrictions,
        public readonly string $type,
        public readonly string $uri,
        #[DataCollectionOf(Copyright::class)]
        public readonly DataCollection $copyrights,
        public readonly ExternalIds $external_ids,
        public readonly array $genres,
        public readonly string $label,
        public readonly int $popularity,
        #[DataCollectionOf(Artist::class)]
        public readonly DataCollection $artists,
        public readonly ?Tracks $tracks,
    ) {}
}
