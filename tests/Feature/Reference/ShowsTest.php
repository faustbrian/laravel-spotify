<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\Show;
use BombenProdukt\Spotify\Models\ShowEpisodesResponse;
use BombenProdukt\Spotify\Models\ShowSavedByCurrentUser;
use BombenProdukt\Spotify\Models\ShowSavedByCurrentUserResponse;
use BombenProdukt\Spotify\Reference\Shows;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Shows::class, 'shows/get-a-show')->findById('');

    expect($actual)->toBeInstanceOf(Show::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Shows::class, 'shows/get-multiple-shows')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Show::class);
});

test('episodes', function (): void {
    $actual = fakeSequence(Shows::class, 'shows/get-a-shows-episodes')->episodes();

    expect($actual)->toBeInstanceOf(ShowEpisodesResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Episode::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Shows::class, 'shows/get-users-saved-shows')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(ShowSavedByCurrentUserResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(ShowSavedByCurrentUser::class);
});
