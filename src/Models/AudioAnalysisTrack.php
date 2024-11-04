<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisTrack extends Data
{
    public int $num_samples;

    public float $duration;

    public string $sample_md5;

    public int $offset_seconds;

    public int $window_seconds;

    public int $analysis_sample_rate;

    public int $analysis_channels;

    public float $end_of_fade_in;

    public float $start_of_fade_out;

    public float $loudness;

    public float $tempo;

    public float $tempo_confidence;

    public int $time_signature;

    public float $time_signature_confidence;

    public int $key;

    public float $key_confidence;

    public int $mode;

    public float $mode_confidence;

    public string $codestring;

    public float $code_version;

    public string $echoprintstring;

    public float $echoprint_version;

    public string $synchstring;

    public int $synch_version;

    public string $rhythmstring;

    public int $rhythm_version;
}
