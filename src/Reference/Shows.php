<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Shows extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("shows/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('shows', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function episodes(array $context = []): array
    {
        return $this->client->get('shows', $context)->json();
    }

    public function savedByCurrentUser(array $context = []): array
    {
        return $this->client->get('me/shows', $context)->json();
    }

    public function saveToCurrentUser(array $ids): array
    {
        return $this->client->put('me/shows', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function deleteFromCurrentUser(array $ids): array
    {
        return $this->client->delete('me/shows', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->client->get('me/shows/contains', [
            'ids' => \implode(',', $ids),
        ])->json();
    }
}
