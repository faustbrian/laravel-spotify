<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Playlists extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("playlists/{$id}", $context)->json();
    }

    public function updateDetails(string $id, array $context = []): array
    {
        return $this->client->put("playlists/{$id}", $context)->json();
    }

    public function allTracks(string $id, array $context = []): array
    {
        return $this->client->get("playlists/{$id}/tracks", $context)->json();
    }

    public function updateTracks(string $id, array $uris): array
    {
        return $this->client->put("playlists/{$id}/tracks", [
            'uris' => \implode(',', $uris),
        ])->json();
    }

    public function addTracks(string $id, array $uris, array $context = []): array
    {
        return $this->client->post("playlists/{$id}/tracks", [
            ...$context,
            'uris' => \implode(',', $uris),
        ])->json();
    }

    public function removeTracks(string $id, array $uris, array $context = []): array
    {
        return $this->client->delete("playlists/{$id}/tracks", [
            ...$context,
            'tracks' => collect($uris)->map(fn (string $uri): array => ['uri' => $uri])->toArray(),
        ])->json();
    }

    public function allForCurrentUser(array $context = []): array
    {
        return $this->client->get('me/playlists', $context)->json();
    }

    public function allForUser(string $userId, array $context = []): array
    {
        return $this->client->get("users/{$userId}/playlists", $context)->json();
    }

    public function create(string $userId, array $context = []): array
    {
        return $this->client->post("users/{$userId}/playlists", $context)->json();
    }

    public function featured(array $context = []): array
    {
        return $this->client->get('browse/featured-playlists', $context)->json();
    }

    public function allByTag(string $categoryId, array $context = []): array
    {
        return $this->client->get("browse/categories/{$categoryId}/playlists", $context)->json();
    }

    public function coverImage(string $playlistId, array $context = []): array
    {
        return $this->client->get("playlists/{$playlistId}/images", $context)->json();
    }

    public function updateCoverImage(string $playlistId, array $context = []): array
    {
        return $this->client->put("playlists/{$playlistId}/images", $context)->json();
    }
}
