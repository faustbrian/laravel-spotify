<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Player extends AbstractReference
{
    public function state(array $context = []): Response
    {
        return $this->get('me/player', $context);
    }

    public function transfer(array $context = []): Response
    {
        return $this->put('me/player', $context);
    }

    public function devices(): Response
    {
        return $this->get('me/player/devices');
    }

    public function currentlyPlaying(array $context = []): Response
    {
        return $this->get('me/player/currently-playing', $context);
    }

    public function play(string $deviceId, array $context = []): Response
    {
        return $this->put('me/player/play', \array_merge(['device_id' => $deviceId], $context));
    }

    public function pause(string $deviceId): Response
    {
        return $this->put('me/player/pause', ['device_id' => $deviceId]);
    }

    public function skipToPrevious(string $deviceId): Response
    {
        return $this->post('me/player/previous', ['device_id' => $deviceId]);
    }

    public function skipToNext(string $deviceId): Response
    {
        return $this->post('me/player/next', ['device_id' => $deviceId]);
    }

    public function seek(string $deviceId, int $positionMs): Response
    {
        return $this->put('me/player/seek', ['device_id' => $deviceId], ['position_ms' => $positionMs]);
    }

    public function repeatMode(string $deviceId, string $state): Response
    {
        return $this->put('me/player/repeat', ['device_id' => $deviceId], ['state' => $state]);
    }

    public function volume(string $deviceId, int $volumePercent): Response
    {
        return $this->put('me/player/volume', ['device_id' => $deviceId], ['volume_percent' => $volumePercent]);
    }

    public function shuffle(string $deviceId, string $state): Response
    {
        return $this->put('me/player/shuffle', ['device_id' => $deviceId], ['state' => $state]);
    }

    public function recentlyPlayed(array $context = []): Response
    {
        return $this->post('me/player/recently-played', $context);
    }

    public function queue(): Response
    {
        return $this->get('me/player/queue');
    }

    public function queueTrack(string $deviceId, string $uri): Response
    {
        return $this->post('me/player/queue', [
            'device_id' => $deviceId,
            'uri' => $uri,
        ]);
    }
}
