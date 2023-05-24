<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Actions extends Data
{
    public function __construct(
        public readonly ?bool $interrupting_playback,
        public readonly ?bool $pausing,
        public readonly ?bool $resuming,
        public readonly ?bool $seeking,
        public readonly ?bool $skipping_next,
        public readonly ?bool $skipping_prev,
        public readonly ?bool $toggling_repeat_context,
        public readonly ?bool $toggling_shuffle,
        public readonly ?bool $toggling_repeat_track,
        public readonly ?bool $transferring_playback,
    ) {}
}
