<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioFeature extends Data
{
    public float $acousticness;

    public string $analysis_url;

    public float $danceability;

    public int $duration_ms;

    public float $energy;

    public string $id;

    public float $instrumentalness;

    public int $key;

    public float $liveness;

    public float $loudness;

    public int $mode;

    public float $speechiness;

    public float $tempo;

    public int $time_signature;

    public string $track_href;

    public string $type;

    public string $uri;

    public float $valence;
}
