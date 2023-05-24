<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Episodes extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->get("episodes/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->get('episodes', [
            ...$context,
            'ids' => $this->concat($ids),
        ]);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->get('me/episodes', $context);
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/episodes', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/episodes', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/episodes/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }
}
