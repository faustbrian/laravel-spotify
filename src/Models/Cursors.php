<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Cursors extends Data
{
    public string $after;

    public string $before;
}
