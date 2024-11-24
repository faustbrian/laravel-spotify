<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
