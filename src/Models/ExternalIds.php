<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class ExternalIds extends AbstractModel
{
    public function __construct(
        public readonly string $isrc,
        public readonly string $ean,
        public readonly string $upc,
    ) {}
}
