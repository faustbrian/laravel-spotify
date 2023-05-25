<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\EpisodePage;
use BombenProdukt\Spotify\Models\SavedShow;
use BombenProdukt\Spotify\Models\SavedShowPage;
use BombenProdukt\Spotify\Models\Show;
use BombenProdukt\Spotify\Reference\Shows;

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
