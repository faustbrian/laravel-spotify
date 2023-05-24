<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistAlbumsResponse;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Reference\Artists;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Artists::class, 'artists/get-an-artist')->findById('');

    expect($actual)->toBeInstanceOf(Artist::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Artists::class, 'artists/get-multiple-artists')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Artist::class);
});

test('albums', function (): void {
    $actual = fakeSequence(Artists::class, 'artists/get-an-artists-albums')->albums('');

    expect($actual)->toBeInstanceOf(ArtistAlbumsResponse::class);
});

test('topTracks', function (): void {
    $actual = fakeSequence(Artists::class, 'artists/get-an-artists-top-tracks')->topTracks('');

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Track::class);
});

test('relatedArtists', function (): void {
    $actual = fakeSequence(Artists::class, 'artists/get-an-artists-related-artists')->relatedArtists('');

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Artist::class);
});
