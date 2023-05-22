<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Tracks extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("tracks/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->client->get('tracks', [
            ...$context,
            'ids' => \implode(',', $ids),
        ]);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/tracks', $context);
    }

    public function saveToCurrentUser(array $ids): Response
    {
        return $this->client->put('me/tracks', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function deleteFromCurrentUser(array $ids): Response
    {
        return $this->client->delete('me/tracks', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->client->get('me/tracks/contains', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function audioFeatures(array $context = []): Response
    {
        return $this->client->get('audio-features', $context);
    }

    public function audioFeature(string $id, array $context = []): Response
    {
        return $this->client->get("audio-features/{$id}", $context);
    }

    public function recommendations(array $context = []): Response
    {
        return $this->client->get('recommendations', $context);
    }
}
