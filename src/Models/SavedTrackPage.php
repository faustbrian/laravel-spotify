<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class SavedTrackPage extends AbstractLengthAwarePage
{
    #[DataCollectionOf(SavedTrack::class)]
    public DataCollection $items;
}
