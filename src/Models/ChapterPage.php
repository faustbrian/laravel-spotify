<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class ChapterPage extends AbstractLengthAwarePage
{
    #[DataCollectionOf(Chapter::class)]
    public DataCollection $items;
}
