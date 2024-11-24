<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class RecommendationSeed extends Data
{
    public int $afterFilteringSize;

    public int $afterRelinkingSize;

    public ?string $href;

    public string $id;

    public int $initialPoolSize;

    public string $type;
}
