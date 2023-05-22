<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Audibooks extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("audibooks/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('audibooks', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function chapters(string $id, array $context = []): array
    {
        return $this->client->get("audibooks/{$id}/chapters", $context)->json();
    }

    public function savedByCurrentUser(array $context = []): array
    {
        return $this->client->get('me/audibooks', $context)->json();
    }

    public function saveToCurrentUser(array $ids): array
    {
        return $this->client->put('me/audibooks', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function deleteFromCurrentUser(array $ids): array
    {
        return $this->client->delete('me/audibooks', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->client->get('me/audibooks/contains', [
            'ids' => \implode(',', $ids),
        ])->json();
    }
}
