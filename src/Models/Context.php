<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Context extends AbstractModel
{
    public function __construct(
        public readonly string $type,
        public readonly string $href,
        public readonly ExternalUrls $external_urls,
        public readonly string $uri,
    ) {}
}
