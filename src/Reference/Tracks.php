<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Tracks extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->get("tracks/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->get('tracks', [
            ...$context,
            'ids' => $this->concat($ids),
        ]);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->get('me/tracks', $context);
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/tracks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/tracks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/tracks/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }

    public function audioFeatures(array $context = []): Response
    {
        return $this->get('audio-features', $context);
    }

    public function audioFeature(string $id, array $context = []): Response
    {
        return $this->get("audio-features/{$id}", $context);
    }

    public function recommendations(array $context = []): Response
    {
        return $this->get('recommendations', $context);
    }
}
