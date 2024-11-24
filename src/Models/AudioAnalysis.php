<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class AudioAnalysis extends Data
{
    public AudioAnalysisMeta $meta;

    public AudioAnalysisTrack $track;

    #[DataCollectionOf(AudioAnalysisTimeInterval::class)]
    public DataCollection $bars;

    #[DataCollectionOf(AudioAnalysisTimeInterval::class)]
    public DataCollection $beats;

    #[DataCollectionOf(AudioAnalysisSection::class)]
    public DataCollection $sections;

    #[DataCollectionOf(AudioAnalysisSegment::class)]
    public DataCollection $segments;

    #[DataCollectionOf(AudioAnalysisTimeInterval::class)]
    public DataCollection $tatums;
}
