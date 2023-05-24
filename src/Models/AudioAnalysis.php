<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class AudioAnalysis extends AbstractModel
{
    public function __construct(
        public AudioAnalysisMeta $meta,
        public AudioAnalysisTrack $track,
        #[DataCollectionOf(AudioAnalysisBar::class)]
        public DataCollection $bars,
        #[DataCollectionOf(AudioAnalysisBeat::class)]
        public DataCollection $beats,
        #[DataCollectionOf(AudioAnalysisSection::class)]
        public DataCollection $sections,
        #[DataCollectionOf(AudioAnalysisSegment::class)]
        public DataCollection $segments,
        #[DataCollectionOf(AudioAnalysisTatum::class)]
        public DataCollection $tatums,
    ) {}
}
