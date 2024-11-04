<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Album;
use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\SavedAlbum;
use BaseCodeOy\Spotify\Models\SavedAlbumPage;
use BaseCodeOy\Spotify\Models\Track;
use BaseCodeOy\Spotify\Models\TrackPage;
use BaseCodeOy\Spotify\Reference\Albums;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Albums::class, 'albums/get-an-album')->findById('');

    expect($actual)->toBeInstanceOf(Album::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Albums::class, 'albums/get-multiple-albums')->findByIds([]);

    expect($actual)->toBeDataCollection(Album::class);
});

test('tracks', function (): void {
    $actual = fakeOkFromFixture(Albums::class, 'albums/get-an-albums-tracks')->tracks('');

    expect($actual)->toBePage(TrackPage::class, Track::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Albums::class, 'albums/get-users-saved-albums')->savedByCurrentUser();

    expect($actual)->toBePage(SavedAlbumPage::class, SavedAlbum::class);
});

test('newReleases', function (): void {
    $actual = fakeOkFromFixture(Albums::class, 'albums/get-new-releases')->newReleases();

    expect($actual)->toBePage(AlbumPage::class, Album::class);
});
