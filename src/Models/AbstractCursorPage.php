<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

abstract class AbstractCursorPage extends Data
{
    public string $href;

    public int $limit;

    public ?string $next;

    public Cursors $cursors;

    public int $total;
}
