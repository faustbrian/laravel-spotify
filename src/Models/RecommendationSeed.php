<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class RecommendationSeed extends Data
{
    public int $afterFilteringSize;

    public int $afterRelinkingSize;

    public string $href;

    public string $id;

    public int $initialPoolSize;

    public string $type;
}
