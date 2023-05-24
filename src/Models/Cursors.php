<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Cursors extends AbstractModel
{
    public function __construct(
        public readonly string $after,
        public readonly string $before,
    ) {}
}
