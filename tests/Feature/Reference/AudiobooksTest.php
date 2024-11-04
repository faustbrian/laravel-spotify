<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Audiobook;
use BaseCodeOy\Spotify\Models\Chapter;
use BaseCodeOy\Spotify\Models\ChapterPage;
use BaseCodeOy\Spotify\Models\SavedAudiobook;
use BaseCodeOy\Spotify\Models\SavedAudiobookPage;
use BaseCodeOy\Spotify\Reference\Audiobooks;

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
