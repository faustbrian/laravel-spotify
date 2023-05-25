<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumPage;
use BombenProdukt\Spotify\Models\SavedAlbumPage;
use BombenProdukt\Spotify\Models\TrackPage;
use BombenProdukt\Spotify\Reference\Albums;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-an-album')->findById('');

    expect($actual)->toBeInstanceOf(Album::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-multiple-albums')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
});

test('tracks', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-an-albums-tracks')->tracks('');

    expect($actual)->toBeInstanceOf(TrackPage::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-users-saved-albums')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(SavedAlbumPage::class);
});

test('newReleases', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-new-releases')->newReleases();

    expect($actual)->toBeInstanceOf(AlbumPage::class);
});
