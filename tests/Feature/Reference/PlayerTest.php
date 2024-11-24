<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\CurrentlyPlaying;
use BaseCodeOy\Spotify\Models\Device;
use BaseCodeOy\Spotify\Models\PlayerState;
use BaseCodeOy\Spotify\Models\Queue;
use BaseCodeOy\Spotify\Models\RecentlyPlayedTrack;
use BaseCodeOy\Spotify\Models\RecentlyPlayedTrackPage;
use BaseCodeOy\Spotify\Reference\Player;

test('state', function (): void {
    $actual = fakeOkFromFixture(Player::class, 'player/get-information-about-the-users-current-playback')->state();

    expect($actual)->toBeInstanceOf(PlayerState::class);
});

test('devices', function (): void {
    $actual = fakeOkFromFixture(Player::class, 'player/get-a-users-available-devices')->devices();

    expect($actual)->toBeDataCollection(Device::class);
});

test('currentlyPlaying', function (): void {
    $actual = fakeOkFromFixture(Player::class, 'player/get-the-users-currently-playing-track')->currentlyPlaying();

    expect($actual)->toBeInstanceOf(CurrentlyPlaying::class);
});

test('recentlyPlayed', function (): void {
    $actual = fakeOkFromFixture(Player::class, 'player/get-recently-played')->recentlyPlayed();

    expect($actual)->toBePage(RecentlyPlayedTrackPage::class, RecentlyPlayedTrack::class);
});

test('queue', function (): void {
    $actual = fakeOkFromFixture(Player::class, 'player/get-queue')->queue();

    expect($actual)->toBeInstanceOf(Queue::class);
});
