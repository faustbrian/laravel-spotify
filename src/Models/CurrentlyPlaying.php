<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class CurrentlyPlaying extends Data
{
    public ?Context $context;

    public int $timestamp;

    public ?int $progress_ms;

    public bool $is_playing;

    public ?Track $item;

    public string $currently_playing_type;

    public Actions $actions;
}
