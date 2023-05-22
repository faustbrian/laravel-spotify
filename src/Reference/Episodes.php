<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Episodes extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("episodes/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('episodes', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function savedByCurrentUser(array $context = []): array
    {
        return $this->client->get('me/episodes', $context)->json();
    }

    public function saveToCurrentUser(array $ids): array
    {
        return $this->client->put('me/episodes', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function deleteFromCurrentUser(array $ids): array
    {
        return $this->client->delete('me/episodes', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->client->get('me/episodes/contains', [
            'ids' => \implode(',', $ids),
        ])->json();
    }
}
