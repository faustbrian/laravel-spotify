<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Image;
use BombenProdukt\Spotify\Models\Playlist;
use BombenProdukt\Spotify\Models\PlaylistPage;
use BombenProdukt\Spotify\Models\PlaylistTrack;
use BombenProdukt\Spotify\Models\PlaylistTrackPage;
use BombenProdukt\Spotify\Reference\Playlists;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-playlist')->findById('');

    expect($actual)->toBeInstanceOf(Playlist::class);
});

test('allTracks', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-playlists-tracks')->allTracks('');

    expect($actual)->toBeInstanceOf(PlaylistTrackPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(PlaylistTrack::class);
});

test('allForCurrentUser', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-a-list-of-current-users-playlists')->allForCurrentUser();

    expect($actual)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('allForUser', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-list-users-playlists')->allForUser('');

    expect($actual)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('featured', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-featured-playlists')->featured();

    expect($actual)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('allByTag', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-a-categories-playlists')->allByCategory('');

    expect($actual)->toBeInstanceOf(PlaylistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Playlist::class);
});

test('coverImage', function (): void {
    $actual = fakeSequence(Playlists::class, 'playlists/get-playlist-cover')->coverImage('');

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Image::class);
});
