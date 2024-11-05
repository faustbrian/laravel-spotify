<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class ExplicitContent extends Data
{
    public bool $filter_enabled;

    public bool $filter_locked;
}
