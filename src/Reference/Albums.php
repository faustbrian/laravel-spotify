<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumsSavedByCurrentUserResponse;
use BombenProdukt\Spotify\Models\NewReleasesResponse;
use BombenProdukt\Spotify\Models\Tracks;
use Spatie\LaravelData\DataCollection;

final readonly class Albums extends AbstractReference
{
    public function findById(string $id, array $context = []): Album
    {
        return Album::fromResponse($this->get("albums/{$id}", $context));
    }

    /**
     * @return DataCollection<string, Album>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Album::collection(
            $this->get('albums', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('albums'),
        );
    }

    public function tracks(string $id, array $context = []): Tracks
    {
        return Tracks::fromResponse($this->get("albums/{$id}/tracks", $context));
    }

    public function savedByCurrentUser(array $context = []): AlbumsSavedByCurrentUserResponse
    {
        return AlbumsSavedByCurrentUserResponse::fromResponse($this->get('me/albums', $context));
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/albums', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/albums', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/albums/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }

    public function newReleases(array $context = []): NewReleasesResponse
    {
        return NewReleasesResponse::from($this->get('browse/new-releases', $context)->json('albums'));
    }
}
