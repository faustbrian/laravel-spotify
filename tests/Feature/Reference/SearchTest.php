<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumPage;
use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistPage;
use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\AudiobookPage;
use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\EpisodePage;
use BombenProdukt\Spotify\Models\Playlist;
use BombenProdukt\Spotify\Models\PlaylistPage;
use BombenProdukt\Spotify\Models\SearchResult;
use BombenProdukt\Spotify\Models\Show;
use BombenProdukt\Spotify\Models\ShowPage;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackPage;
use BombenProdukt\Spotify\Reference\Search;

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
