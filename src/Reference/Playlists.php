<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Playlist;
use BombenProdukt\Spotify\Models\PlaylistCoverImage;
use BombenProdukt\Spotify\Models\PlaylistsResponse;
use BombenProdukt\Spotify\Models\PlaylistTracksResponse;
use Illuminate\Http\Client\Response;
use Spatie\LaravelData\DataCollection;

final readonly class Playlists extends AbstractReference
{
    public function findById(string $id, array $context = []): Playlist
    {
        return Playlist::fromResponse($this->get("playlists/{$id}", $context));
    }

    public function updateDetails(string $id, array $context = []): bool
    {
        return $this->put("playlists/{$id}", $context)->status() === 200;
    }

    public function allTracks(string $id, array $context = []): PlaylistTracksResponse
    {
        return PlaylistTracksResponse::from($this->get("playlists/{$id}/tracks", $context)->json());
    }

    public function updateTracks(string $id, array $uris): Response
    {
        return $this->put("playlists/{$id}/tracks", [
            'uris' => $this->concat($uris),
        ]);
    }

    public function addTracks(string $id, array $uris, array $context = []): Response
    {
        return $this->post("playlists/{$id}/tracks", [
            ...$context,
            'uris' => $this->concat($uris),
        ]);
    }

    public function removeTracks(string $id, array $uris, array $context = []): Response
    {
        return $this->delete("playlists/{$id}/tracks", [
            ...$context,
            'tracks' => collect($uris)->map(fn (string $uri): array => ['uri' => $uri])->toArray(),
        ]);
    }

    public function allForCurrentUser(array $context = []): PlaylistsResponse
    {
        return PlaylistsResponse::from($this->get('me/playlists', $context)->json());
    }

    public function allForUser(string $userId, array $context = []): PlaylistsResponse
    {
        return PlaylistsResponse::from($this->get("users/{$userId}/playlists", $context)->json());
    }

    public function create(string $userId, array $context = []): Response
    {
        return $this->post("users/{$userId}/playlists", $context);
    }

    public function featured(array $context = []): PlaylistsResponse
    {
        return PlaylistsResponse::from($this->get('browse/featured-playlists', $context)->json('playlists'));
    }

    public function allByCategory(string $categoryId, array $context = []): PlaylistsResponse
    {
        return PlaylistsResponse::from($this->get("browse/categories/{$categoryId}/playlists", $context)->json('playlists'));
    }

    /**
     * @return DataCollection<PlaylistCoverImage>
     */
    public function coverImage(string $playlistId, array $context = []): DataCollection
    {
        return PlaylistCoverImage::collection($this->get("playlists/{$playlistId}/images", $context)->json());
    }

    public function updateCoverImage(string $playlistId, array $context = []): Response
    {
        return $this->put("playlists/{$playlistId}/images", $context);
    }
}
