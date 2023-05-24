<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Image extends AbstractModel
{
    public function __construct(
        public readonly string $url,
        public readonly int $height,
        public readonly int $width,
    ) {}
}
