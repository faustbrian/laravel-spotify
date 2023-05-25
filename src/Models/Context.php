<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Context extends Data
{
    public string $type;

    public string $href;

    public ExternalUrls $external_urls;

    public string $uri;
}
