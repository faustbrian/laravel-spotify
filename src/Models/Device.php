<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Device extends Data
{
    public ?string $id;

    public bool $is_active;

    public bool $is_private_session;

    public bool $is_restricted;

    public string $name;

    public string $type;

    public ?int $volume_percent;
}
