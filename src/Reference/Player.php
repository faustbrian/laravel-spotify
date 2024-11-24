<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\CurrentlyPlaying;
use BaseCodeOy\Spotify\Models\Device;
use BaseCodeOy\Spotify\Models\PlayerState;
use BaseCodeOy\Spotify\Models\Queue;
use BaseCodeOy\Spotify\Models\RecentlyPlayedTrackPage;
use Spatie\LaravelData\DataCollection;

final readonly class Player extends AbstractReference
{
    public function state(array $context = []): ?PlayerState
    {
        $response = $this->get('me/player', $context)->json();

        if (empty($response)) {
            return null;
        }

        return PlayerState::from($response);
    }

    public function transfer(array $context = []): bool
    {
        return $this
            ->put('me/player', $context)
            ->status() === 204;
    }

    /**
     * @return DataCollection<Device>
     */
    public function devices(): DataCollection
    {
        return Device::collection($this->get('me/player/devices')->json('devices'));
    }

    public function currentlyPlaying(array $context = []): ?CurrentlyPlaying
    {
        $response = $this->get('me/player/currently-playing', $context)->json();

        if (empty($response)) {
            return null;
        }

        return CurrentlyPlaying::from($response);
    }

    public function play(array $context = []): bool
    {
        return $this
            ->put('me/player/play', $context)
            ->status() === 204;
    }

    public function pause(array $context = []): bool
    {
        return $this
            ->put('me/player/pause', $context)
            ->status() === 204;
    }

    public function skipToPrevious(array $context = []): bool
    {
        return $this
            ->post('me/player/previous', $context)
            ->status() === 204;
    }

    public function skipToNext(array $context = []): bool
    {
        return $this
            ->post('me/player/next', $context)
            ->status() === 204;
    }

    public function seek(int $positionMs, array $context = []): bool
    {
        return $this
            ->put('me/player/seek', $context, ['position_ms' => $positionMs])
            ->status() === 204;
    }

    public function repeatMode(string $state, array $context = []): bool
    {
        return $this
            ->put('me/player/repeat', $context, ['state' => $state])
            ->status() === 204;
    }

    public function volume(int $volumePercent, array $context = []): bool
    {
        return $this
            ->put('me/player/volume', $context, ['volume_percent' => $volumePercent])
            ->status() === 204;
    }

    public function shuffle(string $state, array $context = []): bool
    {
        return $this
            ->put('me/player/shuffle', $context, ['state' => $state])
            ->status() === 204;
    }

    public function recentlyPlayed(array $context = []): RecentlyPlayedTrackPage
    {
        return RecentlyPlayedTrackPage::from($this->get('me/player/recently-played', $context)->json());
    }

    public function queue(): Queue
    {
        return Queue::from($this->get('me/player/queue')->json());
    }

    public function queueTrack(string $uri, array $context = []): bool
    {
        return $this->post('me/player/queue', [
            ...$context,
            'uri' => $uri,
        ])->status() === 204;
    }
}
