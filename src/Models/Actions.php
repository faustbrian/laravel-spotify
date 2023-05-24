<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Actions extends Data
{
    public function __construct(
        public bool $interrupting_playback,
        public bool $pausing,
        public bool $resuming,
        public bool $seeking,
        public bool $skipping_next,
        public bool $skipping_prev,
        public bool $toggling_repeat_context,
        public bool $toggling_shuffle,
        public bool $toggling_repeat_track,
        public bool $transferring_playback,
    ) {}
}
