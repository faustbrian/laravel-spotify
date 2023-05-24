<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Copyright extends AbstractModel
{
    public function __construct(
        public readonly string $text,
        public readonly string $type,
    ) {}
}
