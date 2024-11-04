<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class ArtistPage extends AbstractLengthAwarePage
{
    #[DataCollectionOf(Artist::class)]
    public DataCollection $items;
}
