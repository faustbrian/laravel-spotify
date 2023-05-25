<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\Chapter;
use BombenProdukt\Spotify\Models\ChapterPage;
use BombenProdukt\Spotify\Models\SavedAudiobook;
use BombenProdukt\Spotify\Models\SavedAudiobookPage;
use BombenProdukt\Spotify\Reference\Audiobooks;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-an-audiobook')->findById('');

    expect($actual)->toBeInstanceOf(Audiobook::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-multiple-audiobooks')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Audiobook::class);
});

test('chapters', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-audiobook-chapters')->chapters('');

    expect($actual)->toBeInstanceOf(ChapterPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Chapter::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-users-saved-audiobooks')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(SavedAudiobookPage::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(SavedAudiobook::class);
});
