<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Episode;
use BaseCodeOy\Spotify\Models\SavedEpisode;
use BaseCodeOy\Spotify\Models\SavedEpisodePage;
use BaseCodeOy\Spotify\Reference\Episodes;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Episodes::class, 'episodes/get-an-episode')->findById('');

    expect($actual)->toBeInstanceOf(Episode::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Episodes::class, 'episodes/get-multiple-episodes')->findByIds([]);

    expect($actual)->toBeDataCollection(Episode::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Episodes::class, 'episodes/get-users-saved-episodes')->savedByCurrentUser();

    expect($actual)->toBePage(SavedEpisodePage::class, SavedEpisode::class);
});
