<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Image;
use BaseCodeOy\Spotify\Models\Playlist;
use BaseCodeOy\Spotify\Models\PlaylistPage;
use BaseCodeOy\Spotify\Models\PlaylistTrack;
use BaseCodeOy\Spotify\Models\PlaylistTrackPage;
use BaseCodeOy\Spotify\Reference\Playlists;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-playlist')->findById('');

    expect($actual)->toBeInstanceOf(Playlist::class);
});

test('allTracks', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-playlists-tracks')->allTracks('');

    expect($actual)->toBePage(PlaylistTrackPage::class, PlaylistTrack::class);
});

test('allForCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-a-list-of-current-users-playlists')->allForCurrentUser();

    expect($actual)->toBePage(PlaylistPage::class, Playlist::class);
});

test('allForUser', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-list-users-playlists')->allForUser('');

    expect($actual)->toBePage(PlaylistPage::class, Playlist::class);
});

test('create', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/create-playlist')->create('');

    expect($actual)->toBeInstanceOf(Playlist::class);
});

test('featured', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-featured-playlists')->featured();

    expect($actual)->toBePage(PlaylistPage::class, Playlist::class);
});

test('allByTag', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-a-categories-playlists')->allByCategory('');

    expect($actual)->toBePage(PlaylistPage::class, Playlist::class);
});

test('coverImage', function (): void {
    $actual = fakeOkFromFixture(Playlists::class, 'playlists/get-playlist-cover')->coverImage('');

    expect($actual)->toBeDataCollection(Image::class);
});
