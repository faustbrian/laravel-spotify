<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class TrackRecommendationsResponse extends AbstractModel
{
    public function __construct(
        #[DataCollectionOf(TrackRecommendationSeed::class)]
        public DataCollection $seeds,
        #[DataCollectionOf(Track::class)]
        public DataCollection $tracks,
    ) {}
}
