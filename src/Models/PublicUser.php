<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class PublicUser extends Data
{
    public ?string $display_name;

    public ExternalUrls $external_urls;

    public ?Followers $followers;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public ?DataCollection $images;

    public string $type;

    public string $uri;
}
