<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\Chapter;
use BombenProdukt\Spotify\Models\ChapterPage;
use BombenProdukt\Spotify\Models\SavedAudiobook;
use BombenProdukt\Spotify\Models\SavedAudiobookPage;
use BombenProdukt\Spotify\Reference\Audiobooks;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-an-audiobook')->findById('');

    expect($actual)->toBeInstanceOf(Audiobook::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-multiple-audiobooks')->findByIds([]);

    expect($actual)->toBeDataCollection(Audiobook::class);
});

test('chapters', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-audiobook-chapters')->chapters('');

    expect($actual)->toBePage(ChapterPage::class, Chapter::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Audiobooks::class, 'audiobooks/get-users-saved-audiobooks')->savedByCurrentUser();

    expect($actual)->toBePage(SavedAudiobookPage::class, SavedAudiobook::class);
});
