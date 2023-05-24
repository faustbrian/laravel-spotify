<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class LinkedFrom extends Data
{
    public function __construct(
        public ExternalUrls $external_urls,
        public string $href,
        public string $id,
        public string $type,
        public string $uri,
    ) {}
}
