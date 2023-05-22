<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Playlists extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("playlists/{$id}", $context);
    }

    public function updateDetails(string $id, array $context = []): Response
    {
        return $this->client->put("playlists/{$id}", $context);
    }

    public function allTracks(string $id, array $context = []): Response
    {
        return $this->client->get("playlists/{$id}/tracks", $context);
    }

    public function updateTracks(string $id, array $uris): Response
    {
        return $this->client->put("playlists/{$id}/tracks", [
            'uris' => \implode(',', $uris),
        ]);
    }

    public function addTracks(string $id, array $uris, array $context = []): Response
    {
        return $this->client->post("playlists/{$id}/tracks", [
            ...$context,
            'uris' => \implode(',', $uris),
        ]);
    }

    public function removeTracks(string $id, array $uris, array $context = []): Response
    {
        return $this->client->delete("playlists/{$id}/tracks", [
            ...$context,
            'tracks' => collect($uris)->map(fn (string $uri): Response => ['uri' => $uri])->toArray(),
        ]);
    }

    public function allForCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/playlists', $context);
    }

    public function allForUser(string $userId, array $context = []): Response
    {
        return $this->client->get("users/{$userId}/playlists", $context);
    }

    public function create(string $userId, array $context = []): Response
    {
        return $this->client->post("users/{$userId}/playlists", $context);
    }

    public function featured(array $context = []): Response
    {
        return $this->client->get('browse/featured-playlists', $context);
    }

    public function allByTag(string $categoryId, array $context = []): Response
    {
        return $this->client->get("browse/categories/{$categoryId}/playlists", $context);
    }

    public function coverImage(string $playlistId, array $context = []): Response
    {
        return $this->client->get("playlists/{$playlistId}/images", $context);
    }

    public function updateCoverImage(string $playlistId, array $context = []): Response
    {
        return $this->client->put("playlists/{$playlistId}/images", $context);
    }
}
