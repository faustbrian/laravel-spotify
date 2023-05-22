<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Episodes extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("episodes/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->client->get('episodes', [
            ...$context,
            'ids' => \implode(',', $ids),
        ]);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/episodes', $context);
    }

    public function saveToCurrentUser(array $ids): Response
    {
        return $this->client->put('me/episodes', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function deleteFromCurrentUser(array $ids): Response
    {
        return $this->client->delete('me/episodes', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->client->get('me/episodes/contains', [
            'ids' => \implode(',', $ids),
        ]);
    }
}
