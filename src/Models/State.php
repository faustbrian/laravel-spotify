<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class State extends AbstractModel
{
    public function __construct(
        public readonly Device $device,
        public readonly string $repeat_state,
        public readonly bool $shuffle_state,
        public readonly Context $context,
        public readonly int $timestamp,
        public readonly int $progress_ms,
        public readonly bool $is_playing,
        public readonly Track $item,
        public readonly string $currently_playing_type,
        public readonly Actions $actions,
    ) {}
}
