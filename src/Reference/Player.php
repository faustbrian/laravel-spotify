<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Device;
use BombenProdukt\Spotify\Models\PlayerState;
use BombenProdukt\Spotify\Models\Queue;
use BombenProdukt\Spotify\Models\RecentlyPlayedTrackPage;
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

    public function currentlyPlaying(array $context = []): ?PlayerState
    {
        $response = $this->get('me/player/currently-playing', $context)->json();

        if (empty($response)) {
            return null;
        }

        return PlayerState::from($response);
    }

    public function play(string $deviceId, array $context = []): bool
    {
        return $this
            ->put('me/player/play', \array_merge(['device_id' => $deviceId], $context))
            ->status() === 204;
    }

    public function pause(string $deviceId): bool
    {
        return $this
            ->put('me/player/pause', ['device_id' => $deviceId])
            ->status() === 204;
    }

    public function skipToPrevious(string $deviceId): bool
    {
        return $this
            ->post('me/player/previous', ['device_id' => $deviceId])
            ->status() === 204;
    }

    public function skipToNext(string $deviceId): bool
    {
        return $this
            ->post('me/player/next', ['device_id' => $deviceId])
            ->status() === 204;
    }

    public function seek(string $deviceId, int $positionMs): bool
    {
        return $this
            ->put('me/player/seek', ['device_id' => $deviceId], ['position_ms' => $positionMs])
            ->status() === 204;
    }

    public function repeatMode(string $deviceId, string $state): bool
    {
        return $this
            ->put('me/player/repeat', ['device_id' => $deviceId], ['state' => $state])
            ->status() === 204;
    }

    public function volume(string $deviceId, int $volumePercent): bool
    {
        return $this
            ->put('me/player/volume', ['device_id' => $deviceId], ['volume_percent' => $volumePercent])
            ->status() === 204;
    }

    public function shuffle(string $deviceId, string $state): bool
    {
        return $this
            ->put('me/player/shuffle', ['device_id' => $deviceId], ['state' => $state])
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

    public function queueTrack(string $deviceId, string $uri): bool
    {
        return $this->post('me/player/queue', [
            'device_id' => $deviceId,
            'uri' => $uri,
        ])->status() === 204;
    }
}
