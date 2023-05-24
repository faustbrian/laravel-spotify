<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\AudiobookChaptersResponse;
use BombenProdukt\Spotify\Models\AudiobookSavedByUserResponse;
use BombenProdukt\Spotify\Models\Chapter;
use BombenProdukt\Spotify\Reference\Audiobooks;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Audiobooks::class, 'audiobooks/get-an-audiobook')->findById('');

    expect($actual)->toBeInstanceOf(Audiobook::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Audiobooks::class, 'audiobooks/get-multiple-audiobooks')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Audiobook::class);
});

test('chapters', function (): void {
    $actual = fakeSequence(Audiobooks::class, 'audiobooks/get-audiobook-chapters')->chapters('');

    expect($actual)->toBeInstanceOf(AudiobookChaptersResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Chapter::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Audiobooks::class, 'audiobooks/get-users-saved-audiobooks')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(AudiobookSavedByUserResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Audiobook::class);
});
