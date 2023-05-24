<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Narrator extends AbstractModel
{
    public function __construct(
        public readonly string $name,
    ) {}
}