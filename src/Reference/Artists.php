<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\Artist;
use BaseCodeOy\Spotify\Models\Track;
use Spatie\LaravelData\DataCollection;

final readonly class Artists extends AbstractReference
{
    public function findById(string $id): Artist
    {
        return Artist::from($this->get("artists/{$id}")->json());
    }

    /**
     * @return DataCollection<Artist>
     */
    public function findByIds(array $ids): DataCollection
    {
        return Artist::collection(
            $this->get('artists', [
                'ids' => $this->concat($ids),
            ])->json('artists'),
        );
    }

    public function albums(string $id, array $context = []): AlbumPage
    {
        return AlbumPage::from($this->get("artists/{$id}/albums", $context)->json());
    }

    /**
     * @return DataCollection<Track>
     */
    public function topTracks(string $id, array $context = []): DataCollection
    {
        return Track::collection($this->get("artists/{$id}/top-tracks", $context)->json('tracks'));
    }

    /**
     * @return DataCollection<Artist>
     */
    public function relatedArtists(string $id): DataCollection
    {
        return Artist::collection($this->get("artists/{$id}/related-artists")->json('artists'));
    }
}
