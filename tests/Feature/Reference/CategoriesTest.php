<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models;
use BombenProdukt\Spotify\Reference\Categories;
use Spatie\LaravelData\DataCollection;

test('all', function (): void {
    $actual = fakeSequence(Categories::class, 'categories/get-categories')->all();

    expect($actual)->toBeInstanceOf(Models\Categories::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(Models\Category::class);
});

test('findById', function (): void {
    $actual = fakeSequence(Categories::class, 'categories/get-a-category')->findById('');

    expect($actual)->toBeInstanceOf(Models\Category::class);
});
