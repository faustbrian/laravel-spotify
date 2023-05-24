<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Playlist extends Data
{
    public function __construct(
        public readonly bool $collaborative,
        public readonly string $description,
        public readonly ExternalUrls $external_urls,
        public readonly ?Follower $followers,
        public readonly string $href,
        public readonly string $id,
        public readonly array $images,
        public readonly string $name,
        public readonly User $owner,
        public readonly bool $public,
        public readonly string $snapshot_id,
        public readonly PlaylistTracks $tracks,
        public readonly string $type,
        public readonly string $uri,
    ) {}
}
