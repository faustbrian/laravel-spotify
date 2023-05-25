<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\ArtistPage;
use BombenProdukt\Spotify\Models\PrivateUser;
use BombenProdukt\Spotify\Models\PublicUser;
use BombenProdukt\Spotify\Models\TrackPage;

final readonly class Users extends AbstractReference
{
    public function currentUserProfile(): PrivateUser
    {
        return PrivateUser::from($this->get('me')->json());
    }

    public function topArtists(array $context = []): ArtistPage
    {
        return ArtistPage::from($this->get('me/top/artists', $context)->json());
    }

    public function topTracks(array $context = []): TrackPage
    {
        return TrackPage::from($this->get('me/top/tracks', $context)->json());
    }

    public function profile(string $id): PublicUser
    {
        return PublicUser::from($this->get("users/{$id}")->json());
    }

    public function followPlaylist(string $id, array $context = []): bool
    {
        return $this->put("playlists/{$id}/followers", $context)->status() === 200;
    }

    public function unfollowPlaylist(string $id): bool
    {
        return $this->delete("playlists/{$id}/followers")->status() === 200;
    }

    public function followedArtists(array $context = []): ArtistPage
    {
        return ArtistPage::from(
            $this->get('me/following', [
                ...$context,
                'type' => 'artist',
            ])->json('artists'),
        );
    }

    public function followArtist(array $ids, array $context = []): bool
    {
        return $this->put('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => $this->concat($ids),
        ])->status() === 204;
    }

    public function unfollowArtist(array $ids, array $context = []): bool
    {
        return $this->delete('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function followUser(array $ids, array $context = []): bool
    {
        return $this->put('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => $this->concat($ids),
        ])->status() === 204;
    }

    public function unfollowUser(array $ids, array $context = []): bool
    {
        return $this->delete('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkFollowsArtist(array $context = []): array
    {
        return $this->get('me/following/contains', [
            ...$context,
            'type' => 'artist',
        ])->json();
    }

    public function checkFollowsUser(array $context = []): array
    {
        return $this->get('me/following/contains', [
            ...$context,
            'type' => 'user',
        ])->json();
    }

    public function checkFollowsPlaylist(string $playlistId, array $userIds, array $context = []): array
    {
        return $this->combine(
            $userIds,
            $this->get("playlists/{$playlistId}/followers/contains", [
                ...$context,
                'type' => 'user',
                'ids' => \implode(',', $userIds),
            ])->json(),
        );
    }
}
