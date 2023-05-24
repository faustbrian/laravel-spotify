<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class Device extends AbstractModel
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
