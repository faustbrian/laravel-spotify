<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class ResumePoint extends Data
{
    public bool $fully_played;

    public int $resume_position_ms;
}
