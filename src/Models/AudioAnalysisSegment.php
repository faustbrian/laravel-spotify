<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisSegment extends Data
{
    public float $start;

    public float $duration;

    public float $confidence;

    public float $loudness_start;

    public float $loudness_max;

    public float $loudness_max_time;

    public float $loudness_end;

    public array $pitches;

    public array $timbre;
}
