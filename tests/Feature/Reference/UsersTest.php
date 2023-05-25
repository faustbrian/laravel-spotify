<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistPage;
use BombenProdukt\Spotify\Models\PrivateUser;
use BombenProdukt\Spotify\Models\PublicUser;
use BombenProdukt\Spotify\Models\TrackPage;
use BombenProdukt\Spotify\Reference\Users;
use Spatie\LaravelData\DataCollection;

test('currentUserProfile', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-current-users-profile')->currentUserProfile();

    expect($actual)->toBeInstanceOf(PrivateUser::class);
});

test('topArtists', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-top-artists')->topArtists();

    expect($actual)->toBeInstanceOf(ArtistPage::class);
});

test('topTracks', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-top-tracks')->topTracks();

    expect($actual)->toBeInstanceOf(TrackPage::class);
});

test('profile', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-profile')->profile('');

    expect($actual)->toBeInstanceOf(PublicUser::class);
});

test('followedArtists', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-followed')->followedArtists();

    expect($actual)->toBeInstanceOf(ArtistPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Artist::class);
});
