<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class Track extends AbstractModel
{
    public function __construct(
        #[DataCollectionOf(Artist::class)]
        public readonly DataCollection $artists,
        public readonly array $available_markets,
        public readonly int $disc_number,
        public readonly int $duration_ms,
        public readonly bool $explicit,
        public readonly ExternalUrls $external_urls,
        public readonly string $href,
        public readonly string $id,
        public readonly bool $is_playable,
        public readonly LinkedFrom $linked_from,
        public readonly Restrictions $restrictions,
        public readonly string $name,
        public readonly string $preview_url,
        public readonly int $track_number,
        public readonly string $type,
        public readonly string $uri,
        public readonly bool $is_local,
    ) {}
}
