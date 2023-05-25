<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Track extends Data
{
    public ?Album $album;

    #[DataCollectionOf(Artist::class)]
    public DataCollection $artists;

    public array $available_markets;

    public int $disc_number;

    public int $duration_ms;

    public bool $explicit;

    public ExternalUrls $external_urls;

    public string $href;

    public string $id;

    public ?bool $is_playable;

    public ?LinkedFrom $linked_from;

    public ?Restrictions $restrictions;

    public string $name;

    public ?string $preview_url;

    public int $track_number;

    public string $type;

    public string $uri;

    public bool $is_local;
}
