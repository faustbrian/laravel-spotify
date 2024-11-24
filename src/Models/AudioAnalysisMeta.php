<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class AudioAnalysisMeta extends Data
{
    public string $analyzer_version;

    public string $platform;

    public string $detailed_status;

    public int $status_code;

    public int $timestamp;

    public float $analysis_time;

    public string $input_process;
}
