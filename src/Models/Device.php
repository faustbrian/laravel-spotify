<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Device extends Data
{
    public function __construct(
        public readonly string $id,
        public readonly bool $is_active,
        public readonly bool $is_private_session,
        public readonly bool $is_restricted,
        public readonly string $name,
        public readonly string $type,
        public readonly int $volume_percent,
    ) {}
}
