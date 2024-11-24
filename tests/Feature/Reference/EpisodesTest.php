<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
