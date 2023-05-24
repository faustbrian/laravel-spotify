<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\CurrentUser;
use BombenProdukt\Spotify\Models\CurrentUserTopArtists;
use BombenProdukt\Spotify\Models\CurrentUserTopTracks;
use BombenProdukt\Spotify\Models\User;
use BombenProdukt\Spotify\Models\UserFollowedArtists;

final readonly class Users extends AbstractReference
{
    public function currentUserProfile(): CurrentUser
    {
        return CurrentUser::fromResponse($this->get('me'));
    }

    public function topArtists(array $context = []): CurrentUserTopArtists
    {
        return CurrentUserTopArtists::fromResponse($this->get('me/top/artists', $context));
    }

    public function topTracks(array $context = []): CurrentUserTopTracks
    {
        return CurrentUserTopTracks::fromResponse($this->get('me/top/tracks', $context));
    }

    public function profile(string $id): User
    {
        return User::fromResponse($this->get("users/{$id}"));
    }

    public function followPlaylist(string $id, array $context = []): bool
    {
        return $this->put("playlists/{$id}/followers", $context)->status() === 200;
    }

    public function unfollowPlaylist(string $id): bool
    {
        return $this->delete("playlists/{$id}/followers")->status() === 200;
    }

    public function followedArtists(array $context = []): UserFollowedArtists
    {
        return UserFollowedArtists::from(
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
        ])->status() === 200;
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
        ])->status() === 200;
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
        return $this->get("playlists/{$playlistId}/followers/contains", [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $userIds),
        ])->json();
    }
}
