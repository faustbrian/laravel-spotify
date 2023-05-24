<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Context extends Data
{
    public function __construct(
        public readonly string $type,
        public readonly string $href,
        public readonly ExternalUrls $external_urls,
        public readonly string $uri,
    ) {}
}
