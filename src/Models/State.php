<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class State extends Data
{
    public function __construct(
        public Device $device,
        public string $repeat_state,
        public bool $shuffle_state,
        public Context $context,
        public int $timestamp,
        public int $progress_ms,
        public bool $is_playing,
        public Track $item,
        public string $currently_playing_type,
        public Actions $actions,
    ) {}
}
