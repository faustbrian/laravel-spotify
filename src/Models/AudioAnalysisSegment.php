<?php

declare(strict_types=1);

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
