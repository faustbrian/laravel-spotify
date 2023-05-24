<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Audibooks extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->get("audibooks/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->get('audibooks', [
            ...$context,
            'ids' => $this->concat($ids),
        ]);
    }

    public function chapters(string $id, array $context = []): Response
    {
        return $this->get("audibooks/{$id}/chapters", $context);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->get('me/audibooks', $context);
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/audibooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/audibooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->get('me/audibooks/contains', [
            'ids' => $this->concat($ids),
        ]);
    }
}
