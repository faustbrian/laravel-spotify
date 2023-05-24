<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Shows extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->get("shows/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->get('shows', [
            ...$context,
            'ids' => $this->concat($ids),
        ]);
    }

    public function episodes(array $context = []): Response
    {
        return $this->get('shows', $context);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->get('me/shows', $context);
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/shows', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/shows', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/shows/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }
}
