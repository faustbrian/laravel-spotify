<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Recommendations extends Data
{
    #[DataCollectionOf(RecommendationSeed::class)]
    public DataCollection $seeds;

    #[DataCollectionOf(Track::class)]
    public DataCollection $tracks;
}
