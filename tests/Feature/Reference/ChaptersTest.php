<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\Chapter;
use BombenProdukt\Spotify\Reference\Chapters;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Chapters::class, 'chapters/get-a-chapter')->findById('');

    expect($actual)->toBeInstanceOf(Chapter::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Chapters::class, 'chapters/get-several-chapters')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Chapter::class);
});
