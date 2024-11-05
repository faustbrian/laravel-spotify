<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class SearchResult extends Data
{
    public ?AlbumPage $albums;

    public ?ArtistPage $artists;

    public ?AudiobookPage $audiobooks;

    public ?EpisodePage $episodes;

    public ?PlaylistPage $playlists;

    public ?ShowPage $shows;

    public ?TrackPage $tracks;
}
