<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class ExplicitContent extends AbstractModel
{
    public function __construct(
        public readonly bool $filter_enabled,
        public readonly bool $filter_locked,
    ) {}
}
