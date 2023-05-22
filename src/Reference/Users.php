<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Users extends AbstractReference
{
    public function currentUserProfile(): array
    {
        return $this->client->get('me')->json();
    }

    public function topItems(string $type, array $context = []): array
    {
        return $this->client->get("me/top/{$type}", $context)->json();
    }

    public function profile(string $id): array
    {
        return $this->client->get("users/{$id}")->json();
    }

    public function followPlaylist(string $id, array $context = []): array
    {
        return $this->client->put("playlists/{$id}/followers", $context)->json();
    }

    public function unfollowPlaylist(string $id): array
    {
        return $this->client->delete("playlists/{$id}/followers")->json();
    }

    public function followedArtists(string $type, array $context = []): array
    {
        return $this->client->get('me/following', [
            ...$context,
            'type' => $type,
        ])->json();
    }

    public function followArtist(array $ids, array $context = []): array
    {
        return $this->client->put('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function unfollowArtist(array $ids, array $context = []): array
    {
        return $this->client->delete('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function followUser(array $ids, array $context = []): array
    {
        return $this->client->put('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function unfollowUser(array $ids, array $context = []): array
    {
        return $this->client->delete('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function checkFollowsArtist(array $context = []): array
    {
        return $this->client->get('me/following/contains', [
            ...$context,
            'type' => 'artist',
        ])->json();
    }

    public function checkFollowsUser(array $context = []): array
    {
        return $this->client->get('me/following/contains', [
            ...$context,
            'type' => 'user',
        ])->json();
    }

    public function checkFollowsPlaylist(string $playlistId, array $userIds, array $context = []): array
    {
        return $this->client->get("playlists/{$playlistId}/followers/contains", [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $userIds),
        ])->json();
    }
}
