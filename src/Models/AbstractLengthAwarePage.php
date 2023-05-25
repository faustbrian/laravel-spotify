<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

abstract class AbstractLengthAwarePage extends Data
{
    public string $href;

    public int $limit;

    public ?string $next;

    public int $offset;

    public ?string $previous;

    public int $total;
}
