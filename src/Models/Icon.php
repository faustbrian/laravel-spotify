<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Icon extends AbstractModel
{
    public function __construct(
        public readonly ?int $height,
        public readonly string $url,
        public readonly ?int $width,
    ) {}
}
