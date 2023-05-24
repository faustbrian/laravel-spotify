<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\EpisodeSavedByCurrentUser;
use BombenProdukt\Spotify\Models\EpisodeSavedByCurrentUserResponse;
use BombenProdukt\Spotify\Reference\Episodes;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Episodes::class, 'episodes/get-an-episode')->findById('');

    expect($actual)->toBeInstanceOf(Episode::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Episodes::class, 'episodes/get-multiple-episodes')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Episode::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Episodes::class, 'episodes/get-users-saved-episodes')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(EpisodeSavedByCurrentUserResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(EpisodeSavedByCurrentUser::class);
});
