<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisTrack extends Data
{
    public function __construct(
        public readonly int $num_samples,
        public readonly float $duration,
        public readonly string $sample_md5,
        public readonly int $offset_seconds,
        public readonly int $window_seconds,
        public readonly int $analysis_sample_rate,
        public readonly int $analysis_channels,
        public readonly float $end_of_fade_in,
        public readonly float $start_of_fade_out,
        public readonly float $loudness,
        public readonly float $tempo,
        public readonly float $tempo_confidence,
        public readonly int $time_signature,
        public readonly float $time_signature_confidence,
        public readonly int $key,
        public readonly float $key_confidence,
        public readonly int $mode,
        public readonly float $mode_confidence,
        public readonly string $codestring,
        public readonly float $code_version,
        public readonly string $echoprintstring,
        public readonly float $echoprint_version,
        public readonly string $synchstring,
        public readonly int $synch_version,
        public readonly string $rhythmstring,
        public readonly int $rhythm_version,
    ) {}
}
