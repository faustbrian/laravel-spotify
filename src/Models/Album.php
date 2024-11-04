<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Album extends Data
{
    public string $album_type;

    public int $total_tracks;

    public array $available_markets;

    public ExternalUrls $external_urls;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public DataCollection $images;

    public string $name;

    public string $release_date;

    public string $release_date_precision;

    public ?Restrictions $restrictions;

    public string $type;

    public string $uri;

    #[DataCollectionOf(Copyright::class)]
    public ?DataCollection $copyrights;

    public ?ExternalIds $external_ids;

    public ?array $genres;

    public ?string $label;

    public ?int $popularity;

    #[DataCollectionOf(Artist::class)]
    public DataCollection $artists;

    public ?TrackPage $tracks;
}
