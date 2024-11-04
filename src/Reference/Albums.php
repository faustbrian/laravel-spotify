<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\Album;
use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\SavedAlbumPage;
use BaseCodeOy\Spotify\Models\TrackPage;
use Spatie\LaravelData\DataCollection;

final readonly class Albums extends AbstractReference
{
    public function findById(string $id, array $context = []): Album
    {
        return Album::from($this->get("albums/{$id}", $context)->json());
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

    public function tracks(string $id, array $context = []): TrackPage
    {
        return TrackPage::from($this->get("albums/{$id}/tracks", $context)->json());
    }

    public function savedByCurrentUser(array $context = []): SavedAlbumPage
    {
        return SavedAlbumPage::from($this->get('me/albums', $context)->json());
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
        return $this->combine(
            $ids,
            $this->get('me/albums/contains', [
                'ids' => $this->concat($ids),
            ])->json(),
        );
    }

    public function newReleases(array $context = []): AlbumPage
    {
        return AlbumPage::from($this->get('browse/new-releases', $context)->json('albums'));
    }
}
