<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumSearchResponse;
use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistSearchResponse;
use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\AudiobookSearchResponse;
use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\EpisodeSearchResponse;
use BombenProdukt\Spotify\Models\Playlist;
use BombenProdukt\Spotify\Models\PlaylistSearchResponse;
use BombenProdukt\Spotify\Models\SearchResponse;
use BombenProdukt\Spotify\Models\Show;
use BombenProdukt\Spotify\Models\ShowSearchResponse;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackSearchResponse;
use BombenProdukt\Spotify\Reference\Search;
use Spatie\LaravelData\DataCollection;

test('search', function (): void {
    $actual = fakeSequence(Search::class, 'search/search')->search([''], '');

    expect($actual)->toBeInstanceOf(SearchResponse::class);

    expect($actual->albums)->toBeInstanceOf(AlbumSearchResponse::class);
    expect($actual->albums->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->albums->items->first())->toBeInstanceOf(Album::class);

    expect($actual->artists)->toBeInstanceOf(ArtistSearchResponse::class);
    expect($actual->artists->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->artists->items->first())->toBeInstanceOf(Artist::class);

    expect($actual->audiobooks)->toBeInstanceOf(AudiobookSearchResponse::class);
    expect($actual->audiobooks->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->audiobooks->items->first())->toBeInstanceOf(Audiobook::class);

    expect($actual->episodes)->toBeInstanceOf(EpisodeSearchResponse::class);
    expect($actual->episodes->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->episodes->items->first())->toBeInstanceOf(Episode::class);

    expect($actual->playlists)->toBeInstanceOf(PlaylistSearchResponse::class);
    expect($actual->playlists->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->playlists->items->first())->toBeInstanceOf(Playlist::class);

    expect($actual->shows)->toBeInstanceOf(ShowSearchResponse::class);
    expect($actual->shows->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->shows->items->first())->toBeInstanceOf(Show::class);

    expect($actual->tracks)->toBeInstanceOf(TrackSearchResponse::class);
    expect($actual->tracks->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->tracks->items->first())->toBeInstanceOf(Track::class);
});

test('album', function (): void {
    $actual = fakeSequence(Search::class, 'search/album')->album('');

    expect($actual)->toBeInstanceOf(AlbumSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Album::class);
});

test('artist', function (): void {
    $actual = fakeSequence(Search::class, 'search/artist')->artist('');

    expect($actual)->toBeInstanceOf(ArtistSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Artist::class);
});

test('audiobook', function (): void {
    $actual = fakeSequence(Search::class, 'search/audiobook')->audiobook('');

    expect($actual)->toBeInstanceOf(AudiobookSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Audiobook::class);
});

test('episode', function (): void {
    $actual = fakeSequence(Search::class, 'search/episode')->episode('');

    expect($actual)->toBeInstanceOf(EpisodeSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Episode::class);
});

test('playlist', function (): void {
    $actual = fakeSequence(Search::class, 'search/playlist')->playlist('');

    expect($actual)->toBeInstanceOf(PlaylistSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('show', function (): void {
    $actual = fakeSequence(Search::class, 'search/show')->show('');

    expect($actual)->toBeInstanceOf(ShowSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Show::class);
});

test('track', function (): void {
    $actual = fakeSequence(Search::class, 'search/track')->track('');

    expect($actual)->toBeInstanceOf(TrackSearchResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Track::class);
});
