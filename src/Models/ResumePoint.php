<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class ResumePoint extends AbstractModel
{
    public function __construct(
        public readonly bool $fully_played,
        public readonly int $resume_position_ms,
    ) {}
}
