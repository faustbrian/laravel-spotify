<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
