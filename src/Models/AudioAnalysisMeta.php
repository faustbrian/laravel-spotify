<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisMeta extends Data
{
    public function __construct(
        public readonly string $analyzer_version,
        public readonly string $platform,
        public readonly string $detailed_status,
        public readonly int $status_code,
        public readonly int $timestamp,
        public readonly float $analysis_time,
        public readonly string $input_process,
    ) {}
}
