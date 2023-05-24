<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistAlbumsResponse;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\Tracks;
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

    public function albums(string $id, array $context = []): ArtistAlbumsResponse
    {
        return ArtistAlbumsResponse::from($this->get("artists/{$id}/albums", $context)->json());
    }

    /**
     * @return DataCollection<Tracks>
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
