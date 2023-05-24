<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

final class SearchResponse extends AbstractModel
{
    public function __construct(
        public readonly ?AlbumSearchResponse $albums,
        public readonly ?ArtistSearchResponse $artists,
        public readonly ?AudiobookSearchResponse $audiobooks,
        public readonly ?EpisodeSearchResponse $episodes,
        public readonly ?PlaylistSearchResponse $playlists,
        public readonly ?ShowSearchResponse $shows,
        public readonly ?TrackSearchResponse $tracks,
    ) {}
}
