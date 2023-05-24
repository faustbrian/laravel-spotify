<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class AudioAnalysis extends Data
{
    public function __construct(
        public readonly AudioAnalysisMeta $meta,
        public readonly AudioAnalysisTrack $track,
        #[DataCollectionOf(AudioAnalysisBar::class)]
        public readonly DataCollection $bars,
        #[DataCollectionOf(AudioAnalysisBeat::class)]
        public readonly DataCollection $beats,
        #[DataCollectionOf(AudioAnalysisSection::class)]
        public readonly DataCollection $sections,
        #[DataCollectionOf(AudioAnalysisSegment::class)]
        public readonly DataCollection $segments,
        #[DataCollectionOf(AudioAnalysisTatum::class)]
        public readonly DataCollection $tatums,
    ) {}
}
