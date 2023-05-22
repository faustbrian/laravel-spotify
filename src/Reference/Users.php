<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Users extends AbstractReference
{
    public function currentUserProfile(): Response
    {
        return $this->client->get('me');
    }

    public function topItems(string $type, array $context = []): Response
    {
        return $this->client->get("me/top/{$type}", $context);
    }

    public function profile(string $id): Response
    {
        return $this->client->get("users/{$id}");
    }

    public function followPlaylist(string $id, array $context = []): Response
    {
        return $this->client->put("playlists/{$id}/followers", $context);
    }

    public function unfollowPlaylist(string $id): Response
    {
        return $this->client->delete("playlists/{$id}/followers");
    }

    public function followedArtists(string $type, array $context = []): Response
    {
        return $this->client->get('me/following', [
            ...$context,
            'type' => $type,
        ]);
    }

    public function followArtist(array $ids, array $context = []): Response
    {
        return $this->client->put('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => \implode(',', $ids),
        ]);
    }

    public function unfollowArtist(array $ids, array $context = []): Response
    {
        return $this->client->delete('me/following', [
            ...$context,
            'type' => 'artist',
            'ids' => \implode(',', $ids),
        ]);
    }

    public function followUser(array $ids, array $context = []): Response
    {
        return $this->client->put('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $ids),
        ]);
    }

    public function unfollowUser(array $ids, array $context = []): Response
    {
        return $this->client->delete('me/following', [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkFollowsArtist(array $context = []): Response
    {
        return $this->client->get('me/following/contains', [
            ...$context,
            'type' => 'artist',
        ]);
    }

    public function checkFollowsUser(array $context = []): Response
    {
        return $this->client->get('me/following/contains', [
            ...$context,
            'type' => 'user',
        ]);
    }

    public function checkFollowsPlaylist(string $playlistId, array $userIds, array $context = []): Response
    {
        return $this->client->get("playlists/{$playlistId}/followers/contains", [
            ...$context,
            'type' => 'user',
            'ids' => \implode(',', $userIds),
        ]);
    }
}
