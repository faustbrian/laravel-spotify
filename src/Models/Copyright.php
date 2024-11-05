<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Copyright extends Data
{
    public string $text;

    public string $type;
}
