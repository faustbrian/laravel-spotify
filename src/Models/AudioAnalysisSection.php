<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisSection extends Data
{
    public float $start;

    public float $duration;

    public float $confidence;

    public float $loudness;

    public float $tempo;

    public float $tempo_confidence;

    public int $key;

    public float $key_confidence;

    public int $mode;

    public float $mode_confidence;

    public int $time_signature;

    public float $time_signature_confidence;
}
