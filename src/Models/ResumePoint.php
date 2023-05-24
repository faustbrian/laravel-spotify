<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class ResumePoint extends Data
{
    public function __construct(
        public readonly bool $fully_played,
        public readonly int $resume_position_ms,
    ) {}
}
