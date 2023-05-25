<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Image;
use BombenProdukt\Spotify\Models\Playlist;
use BombenProdukt\Spotify\Models\PlaylistPage;
use BombenProdukt\Spotify\Models\PlaylistTrackPage;
use Spatie\LaravelData\DataCollection;

final readonly class Playlists extends AbstractReference
{
    public function findById(string $id, array $context = []): Playlist
    {
        return Playlist::from($this->get("playlists/{$id}", $context)->json());
    }

    public function updateDetails(string $id, array $context = []): bool
    {
        return $this
            ->put("playlists/{$id}", $context)
            ->status() === 200;
    }

    public function allTracks(string $id, array $context = []): PlaylistTrackPage
    {
        return PlaylistTrackPage::from($this->get("playlists/{$id}/tracks", $context)->json());
    }

    public function updateTracks(string $id, array $uris): array
    {
        return $this->put("playlists/{$id}/tracks", [
            'uris' => $this->concat($uris),
        ])->json();
    }

    public function addTracks(string $id, array $uris, array $context = []): bool
    {
        return $this->post("playlists/{$id}/tracks", [
            ...$context,
            'uris' => $this->concat($uris),
        ])->status() === 201;
    }

    public function removeTracks(string $id, array $uris, array $context = []): array
    {
        return $this->delete("playlists/{$id}/tracks", [
            ...$context,
            'tracks' => collect($uris)->map(fn (string $uri): array => ['uri' => $uri])->toArray(),
        ])->array();
    }

    public function allForCurrentUser(array $context = []): PlaylistPage
    {
        return PlaylistPage::from($this->get('me/playlists', $context)->json());
    }

    public function allForUser(string $userId, array $context = []): PlaylistPage
    {
        return PlaylistPage::from($this->get("users/{$userId}/playlists", $context)->json());
    }

    public function create(string $userId, array $context = []): bool
    {
        return $this
            ->post("users/{$userId}/playlists", $context)
            ->status() === 201;
    }

    public function featured(array $context = []): PlaylistPage
    {
        return PlaylistPage::from($this->get('browse/featured-playlists', $context)->json('playlists'));
    }

    public function allByCategory(string $categoryId, array $context = []): PlaylistPage
    {
        return PlaylistPage::from($this->get("browse/categories/{$categoryId}/playlists", $context)->json('playlists'));
    }

    /**
     * @return DataCollection<Image>
     */
    public function coverImage(string $playlistId, array $context = []): DataCollection
    {
        return Image::collection($this->get("playlists/{$playlistId}/images", $context)->json());
    }

    public function updateCoverImage(string $playlistId, array $context = []): bool
    {
        return $this
            ->put("playlists/{$playlistId}/images", $context)
            ->status() === 202;
    }
}
