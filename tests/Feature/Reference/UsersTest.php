<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\ArtistPage;
use BombenProdukt\Spotify\Models\PrivateUser;
use BombenProdukt\Spotify\Models\PublicUser;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackPage;
use BombenProdukt\Spotify\Reference\Users;

test('currentUserProfile', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-current-users-profile')->currentUserProfile();

    expect($actual)->toBeInstanceOf(PrivateUser::class);
});

test('topArtists', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-users-top-artists')->topArtists();

    expect($actual)->toBePage(ArtistPage::class, Artist::class);
});

test('topTracks', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-users-top-tracks')->topTracks();

    expect($actual)->toBePage(TrackPage::class, Track::class);
});

test('profile', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-users-profile')->profile('');

    expect($actual)->toBeInstanceOf(PublicUser::class);
});

test('followedArtists', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-followed')->followedArtists();

    expect($actual)->toBePage(ArtistPage::class, Artist::class);
});

test('checkFollowsPlaylist', function (): void {
    $actual = fakeOkFromFixture(Users::class, 'users/get-followed')->followedArtists();

    expect($actual)->toBePage(ArtistPage::class, Artist::class);
});
