<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Albums extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("albums/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('albums', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function tracks(string $id, array $context = []): array
    {
        return $this->client->get("albums/{$id}/tracks", $context)->json();
    }

    public function savedByCurrentUser(array $context = []): array
    {
        return $this->client->get('me/albums', $context)->json();
    }

    public function saveToCurrentUser(array $ids): array
    {
        return $this->client->put('me/albums', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function deleteFromCurrentUser(array $ids): array
    {
        return $this->client->delete('me/albums', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->client->get('me/albums/contains', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function newReleases(array $context = []): array
    {
        return $this->client->get('browse/new-releases', $context)->json();
    }
}
