<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Actions extends Data
{
    public bool $interrupting_playback;

    public bool $pausing;

    public bool $resuming;

    public bool $seeking;

    public bool $skipping_next;

    public bool $skipping_prev;

    public bool $toggling_repeat_context;

    public bool $toggling_shuffle;

    public bool $toggling_repeat_track;

    public bool $transferring_playback;
}
