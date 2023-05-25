<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class PrivateUser extends Data
{
    public string $country;

    public string $display_name;

    public string $email;

    public ExplicitContent $explicit_content;

    public ExternalUrls $external_urls;

    public Follower $followers;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public DataCollection $images;

    public string $product;

    public string $type;

    public string $uri;
}
