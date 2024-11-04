<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Episode;
use BaseCodeOy\Spotify\Models\EpisodePage;
use BaseCodeOy\Spotify\Models\SavedShow;
use BaseCodeOy\Spotify\Models\SavedShowPage;
use BaseCodeOy\Spotify\Models\Show;
use BaseCodeOy\Spotify\Reference\Shows;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Shows::class, 'shows/get-a-show')->findById('');

    expect($actual)->toBeInstanceOf(Show::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Shows::class, 'shows/get-multiple-shows')->findByIds([]);

    expect($actual)->toBeDataCollection(Show::class);
});

test('episodes', function (): void {
    $actual = fakeOkFromFixture(Shows::class, 'shows/get-a-shows-episodes')->episodes();

    expect($actual)->toBePage(EpisodePage::class, Episode::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Shows::class, 'shows/get-users-saved-shows')->savedByCurrentUser();

    expect($actual)->toBePage(SavedShowPage::class, SavedShow::class);
});
