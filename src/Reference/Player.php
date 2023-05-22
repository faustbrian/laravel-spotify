<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Player extends AbstractReference
{
    public function state(array $context = []): array
    {
        return $this->client
            ->get('me/player', $context)
            ->json('devices');
    }

    public function transfer(array $context = []): array
    {
        return $this->client
            ->put('me/player', $context)
            ->json('devices');
    }

    public function devices(): array
    {
        return $this->client
            ->get('me/player/devices')
            ->json('devices');
    }

    public function currentlyPlaying(array $context = []): array
    {
        return $this->client
            ->get('me/player/currently-playing', $context)
            ->json('devices');
    }

    public function play(string $deviceId, array $context = []): array
    {
        return $this->client
            ->put('me/player/play', \array_merge(['device_id' => $deviceId], $context))
            ->json();
    }

    public function pause(string $deviceId): array
    {
        return $this->client
            ->put('me/player/pause', ['device_id' => $deviceId])
            ->json();
    }

    public function skipToPrevious(string $deviceId): array
    {
        return $this->client
            ->post('me/player/previous', ['device_id' => $deviceId])
            ->json();
    }

    public function skipToNext(string $deviceId): array
    {
        return $this->client
            ->post('me/player/next', ['device_id' => $deviceId])
            ->json();
    }

    public function seek(string $deviceId, int $positionMs): array
    {
        return $this->client
            ->put('me/player/seek', ['device_id' => $deviceId], ['position_ms' => $positionMs])
            ->json();
    }

    public function repeatMode(string $deviceId, string $state): array
    {
        return $this->client
            ->put('me/player/repeat', ['device_id' => $deviceId], ['state' => $state])
            ->json();
    }

    public function volume(string $deviceId, int $volumePercent): array
    {
        return $this->client
            ->put('me/player/volume', ['device_id' => $deviceId], ['volume_percent' => $volumePercent])
            ->json();
    }

    public function shuffle(string $deviceId, string $state): array
    {
        return $this->client
            ->put('me/player/shuffle', ['device_id' => $deviceId], ['state' => $state])
            ->json();
    }

    public function recentlyPlayed(array $context = []): array
    {
        return $this->client
            ->post('me/player/recently-played', $context)
            ->json();
    }

    public function queue(): array
    {
        return $this->client
            ->get('me/player/queue')
            ->json();
    }

    public function queueTrack(string $deviceId, string $uri): array
    {
        return $this->client
            ->post('me/player/queue', [
                'device_id' => $deviceId,
                'uri' => $uri,
            ])
            ->json();
    }
}
