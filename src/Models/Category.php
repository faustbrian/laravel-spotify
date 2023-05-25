<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Category extends Data
{
    public string $href;

    #[DataCollectionOf(Image::class)]
    public DataCollection $icons;

    public string $id;

    public string $name;
}
