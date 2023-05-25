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
use Spatie\LaravelData\DataCollection;

test('search', function (): void {
    $actual = fakeSequence(Search::class, 'search/search')->search([''], '');

    expect($actual)->toBeInstanceOf(SearchResult::class);

    expect($actual->albums)->toBeInstanceOf(AlbumPage::class);
    expect($actual->albums->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->albums->items->first())->toBeInstanceOf(Album::class);

    expect($actual->artists)->toBeInstanceOf(ArtistPage::class);
    expect($actual->artists->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->artists->items->first())->toBeInstanceOf(Artist::class);

    expect($actual->audiobooks)->toBeInstanceOf(AudiobookPage::class);
    expect($actual->audiobooks->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->audiobooks->items->first())->toBeInstanceOf(Audiobook::class);

    expect($actual->episodes)->toBeInstanceOf(EpisodePage::class);
    expect($actual->episodes->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->episodes->items->first())->toBeInstanceOf(Episode::class);

    expect($actual->playlists)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->playlists->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->playlists->items->first())->toBeInstanceOf(Playlist::class);

    expect($actual->shows)->toBeInstanceOf(ShowPage::class);
    expect($actual->shows->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->shows->items->first())->toBeInstanceOf(Show::class);

    expect($actual->tracks)->toBeInstanceOf(TrackPage::class);
    expect($actual->tracks->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->tracks->items->first())->toBeInstanceOf(Track::class);
});

test('album', function (): void {
    $actual = fakeSequence(Search::class, 'search/album')->album('');

    expect($actual)->toBeInstanceOf(AlbumPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Album::class);
});

test('artist', function (): void {
    $actual = fakeSequence(Search::class, 'search/artist')->artist('');

    expect($actual)->toBeInstanceOf(ArtistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Artist::class);
});

test('audiobook', function (): void {
    $actual = fakeSequence(Search::class, 'search/audiobook')->audiobook('');

    expect($actual)->toBeInstanceOf(AudiobookPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Audiobook::class);
});

test('episode', function (): void {
    $actual = fakeSequence(Search::class, 'search/episode')->episode('');

    expect($actual)->toBeInstanceOf(EpisodePage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Episode::class);
});

test('playlist', function (): void {
    $actual = fakeSequence(Search::class, 'search/playlist')->playlist('');

    expect($actual)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('show', function (): void {
    $actual = fakeSequence(Search::class, 'search/show')->show('');

    expect($actual)->toBeInstanceOf(ShowPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Show::class);
});

test('track', function (): void {
    $actual = fakeSequence(Search::class, 'search/track')->track('');

    expect($actual)->toBeInstanceOf(TrackPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Track::class);
});
