<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Image extends Data
{
    public string $url;

    public ?int $height;

    public ?int $width;
}
