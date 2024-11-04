<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Artist;
use BaseCodeOy\Spotify\Models\ArtistPage;
use BaseCodeOy\Spotify\Models\PrivateUser;
use BaseCodeOy\Spotify\Models\PublicUser;
use BaseCodeOy\Spotify\Models\Track;
use BaseCodeOy\Spotify\Models\TrackPage;
use BaseCodeOy\Spotify\Reference\Users;

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
    $actual = fakeOk(Users::class, [false, true, false])
        ->checkFollowsPlaylist('3cEYpjA9oz9GiPac4AsH4n', ['jmperezperez', 'thelinmichael', 'wizzler']);

    expect($actual)->toBe([
        'jmperezperez' => false,
        'thelinmichael' => true,
        'wizzler' => false,
    ]);
});
