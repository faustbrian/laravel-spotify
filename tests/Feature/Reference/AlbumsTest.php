<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumPage;
use BombenProdukt\Spotify\Models\SavedAlbum;
use BombenProdukt\Spotify\Models\SavedAlbumPage;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackPage;
use BombenProdukt\Spotify\Reference\Albums;

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
