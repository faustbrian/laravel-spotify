<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Tracks extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("tracks/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('tracks', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function savedByCurrentUser(array $context = []): array
    {
        return $this->client->get('me/tracks', $context)->json();
    }

    public function saveToCurrentUser(array $ids): array
    {
        return $this->client->put('me/tracks', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function deleteFromCurrentUser(array $ids): array
    {
        return $this->client->delete('me/tracks', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->client->get('me/tracks/contains', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function audioFeatures(array $context = []): array
    {
        return $this->client->get('audio-features', $context)->json();
    }

    public function audioFeature(string $id, array $context = []): array
    {
        return $this->client->get("audio-features/{$id}", $context)->json();
    }

    public function recommendations(array $context = []): array
    {
        return $this->client->get('recommendations', $context)->json();
    }
}
