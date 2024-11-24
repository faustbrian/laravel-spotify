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

final class Recommendations extends Data
{
    #[DataCollectionOf(RecommendationSeed::class)]
    public DataCollection $seeds;

    #[DataCollectionOf(Track::class)]
    public DataCollection $tracks;
}
