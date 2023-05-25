<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Chapter;
use BombenProdukt\Spotify\Reference\Chapters;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Chapters::class, 'chapters/get-a-chapter')->findById('');

    expect($actual)->toBeInstanceOf(Chapter::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Chapters::class, 'chapters/get-several-chapters')->findByIds([]);

    expect($actual)->toBeDataCollection(Chapter::class);
});
