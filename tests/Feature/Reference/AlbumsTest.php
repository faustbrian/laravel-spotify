<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Album;
use BombenProdukt\Spotify\Models\AlbumSavedByCurrentUserResponse;
use BombenProdukt\Spotify\Models\NewReleasesResponse;
use BombenProdukt\Spotify\Models\Tracks;
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

    expect($actual)->toBeInstanceOf(Tracks::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-users-saved-albums')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(AlbumSavedByCurrentUserResponse::class);
});

test('newReleases', function (): void {
    $actual = fakeSequence(Albums::class, 'albums/get-new-releases')->newReleases();

    expect($actual)->toBeInstanceOf(NewReleasesResponse::class);
});
