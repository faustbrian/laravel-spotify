<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Device;
use BombenProdukt\Spotify\Models\PlayerQueueResponse;
use BombenProdukt\Spotify\Models\PlayerState;
use BombenProdukt\Spotify\Models\RecentlyPlayedResponse;
use BombenProdukt\Spotify\Reference\Player;
use Spatie\LaravelData\DataCollection;

test('state', function (): void {
    $actual = fakeSequence(Player::class, 'player/get-information-about-the-users-current-playback')->state();

    expect($actual)->toBeInstanceOf(PlayerState::class);
});

test('devices', function (): void {
    $actual = fakeSequence(Player::class, 'player/get-a-users-available-devices')->devices();

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Device::class);
});

test('currentlyPlaying', function (): void {
    $actual = fakeSequence(Player::class, 'player/get-the-users-currently-playing-track')->currentlyPlaying();

    expect($actual)->toBeInstanceOf(PlayerState::class);
});

test('recentlyPlayed', function (): void {
    $actual = fakeSequence(Player::class, 'player/get-recently-played')->recentlyPlayed();

    expect($actual)->toBeInstanceOf(RecentlyPlayedResponse::class);
});

test('queue', function (): void {
    $actual = fakeSequence(Player::class, 'player/get-queue')->queue();

    expect($actual)->toBeInstanceOf(PlayerQueueResponse::class);
});
