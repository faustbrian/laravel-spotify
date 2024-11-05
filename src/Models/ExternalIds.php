<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class ExternalIds extends Data
{
    public string $isrc;

    public string $ean;

    public string $upc;
}
