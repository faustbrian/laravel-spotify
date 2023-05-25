<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class AlbumPage extends AbstractLengthAwarePage
{
    #[DataCollectionOf(Album::class)]
    public DataCollection $items;
}
