<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Artist;
use BombenProdukt\Spotify\Models\CurrentUser;
use BombenProdukt\Spotify\Models\CurrentUserTopArtists;
use BombenProdukt\Spotify\Models\CurrentUserTopTracks;
use BombenProdukt\Spotify\Models\User;
use BombenProdukt\Spotify\Models\UserFollowedArtists;
use BombenProdukt\Spotify\Reference\Users;
use Spatie\LaravelData\DataCollection;

test('currentUserProfile', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-current-users-profile')->currentUserProfile();

    expect($actual)->toBeInstanceOf(CurrentUser::class);
});

test('topArtists', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-top-artists')->topArtists();

    expect($actual)->toBeInstanceOf(CurrentUserTopArtists::class);
});

test('topTracks', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-top-tracks')->topTracks();

    expect($actual)->toBeInstanceOf(CurrentUserTopTracks::class);
});

test('profile', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-users-profile')->profile('');

    expect($actual)->toBeInstanceOf(User::class);
});

test('followedArtists', function (): void {
    $actual = fakeSequence(Users::class, 'users/get-followed')->followedArtists();

    expect($actual)->toBeInstanceOf(UserFollowedArtists::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Artist::class);
});
