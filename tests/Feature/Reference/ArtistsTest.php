<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Album;
use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\Artist;
use BaseCodeOy\Spotify\Models\Track;
use BaseCodeOy\Spotify\Reference\Artists;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Artists::class, 'artists/get-an-artist')->findById('');

    expect($actual)->toBeInstanceOf(Artist::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Artists::class, 'artists/get-multiple-artists')->findByIds([]);

    expect($actual)->toBeDataCollection(Artist::class);
});

test('albums', function (): void {
    $actual = fakeOkFromFixture(Artists::class, 'artists/get-an-artists-albums')->albums('');

    expect($actual)->toBePage(AlbumPage::class, Album::class);
});

test('topTracks', function (): void {
    $actual = fakeOkFromFixture(Artists::class, 'artists/get-an-artists-top-tracks')->topTracks('');

    expect($actual)->toBeDataCollection(Track::class);
});

test('relatedArtists', function (): void {
    $actual = fakeOkFromFixture(Artists::class, 'artists/get-an-artists-related-artists')->relatedArtists('');

    expect($actual)->toBeDataCollection(Artist::class);
});
