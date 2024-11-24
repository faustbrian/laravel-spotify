<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Album;
use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\Artist;
use BaseCodeOy\Spotify\Models\ArtistPage;
use BaseCodeOy\Spotify\Models\Audiobook;
use BaseCodeOy\Spotify\Models\AudiobookPage;
use BaseCodeOy\Spotify\Models\Episode;
use BaseCodeOy\Spotify\Models\EpisodePage;
use BaseCodeOy\Spotify\Models\Playlist;
use BaseCodeOy\Spotify\Models\PlaylistPage;
use BaseCodeOy\Spotify\Models\SearchResult;
use BaseCodeOy\Spotify\Models\Show;
use BaseCodeOy\Spotify\Models\ShowPage;
use BaseCodeOy\Spotify\Models\Track;
use BaseCodeOy\Spotify\Models\TrackPage;
use BaseCodeOy\Spotify\Reference\Search;

test('search', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/search')->search([''], '');

    expect($actual)->toBeInstanceOf(SearchResult::class);
    expect($actual->albums)->toBePage(AlbumPage::class, Album::class);
    expect($actual->artists)->toBePage(ArtistPage::class, Artist::class);
    expect($actual->audiobooks)->toBePage(AudiobookPage::class, Audiobook::class);
    expect($actual->episodes)->toBePage(EpisodePage::class, Episode::class);
    expect($actual->playlists)->toBePage(PlaylistPage::class, Playlist::class);
    expect($actual->shows)->toBePage(ShowPage::class, Show::class);
    expect($actual->tracks)->toBePage(TrackPage::class, Track::class);
});

test('album', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/album')->album('');

    expect($actual)->toBePage(AlbumPage::class, Album::class);
});

test('artist', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/artist')->artist('');

    expect($actual)->toBePage(ArtistPage::class, Artist::class);
});

test('audiobook', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/audiobook')->audiobook('');

    expect($actual)->toBePage(AudiobookPage::class, Audiobook::class);
});

test('episode', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/episode')->episode('');

    expect($actual)->toBePage(EpisodePage::class, Episode::class);
});

test('playlist', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/playlist')->playlist('');

    expect($actual)->toBePage(PlaylistPage::class, Playlist::class);
});

test('show', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/show')->show('');

    expect($actual)->toBePage(ShowPage::class, Show::class);
});

test('track', function (): void {
    $actual = fakeOkFromFixture(Search::class, 'search/track')->track('');

    expect($actual)->toBePage(TrackPage::class, Track::class);
});
