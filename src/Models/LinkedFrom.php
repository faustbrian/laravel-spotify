<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class LinkedFrom extends Data
{
    public function __construct(
        public readonly ?ExternalUrls $external_urls,
        public readonly ?string $href,
        public readonly ?string $id,
        public readonly ?string $type,
        public readonly ?string $uri,
    ) {}
}
