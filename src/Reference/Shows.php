<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Shows extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("shows/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->client->get('shows', [
            ...$context,
            'ids' => \implode(',', $ids),
        ]);
    }

    public function episodes(array $context = []): Response
    {
        return $this->client->get('shows', $context);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/shows', $context);
    }

    public function saveToCurrentUser(array $ids): Response
    {
        return $this->client->put('me/shows', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function deleteFromCurrentUser(array $ids): Response
    {
        return $this->client->delete('me/shows', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->client->get('me/shows/contains', [
            'ids' => \implode(',', $ids),
        ]);
    }
}
