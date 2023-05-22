<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Albums extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("albums/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->client->get('albums', [
            ...$context,
            'ids' => \implode(',', $ids),
        ]);
    }

    public function tracks(string $id, array $context = []): Response
    {
        return $this->client->get("albums/{$id}/tracks", $context);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/albums', $context);
    }

    public function saveToCurrentUser(array $ids): Response
    {
        return $this->client->put('me/albums', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function deleteFromCurrentUser(array $ids): Response
    {
        return $this->client->delete('me/albums', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->client->get('me/albums/contains', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function newReleases(array $context = []): Response
    {
        return $this->client->get('browse/new-releases', $context);
    }
}
