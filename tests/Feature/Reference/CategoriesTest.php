<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Category;
use BaseCodeOy\Spotify\Models\CategoryPage;
use BaseCodeOy\Spotify\Reference\Categories;

test('all', function (): void {
    $actual = fakeOkFromFixture(Categories::class, 'categories/get-categories')->all();

    expect($actual)->toBePage(CategoryPage::class, Category::class);
});

test('findById', function (): void {
    $actual = fakeOkFromFixture(Categories::class, 'categories/get-a-category')->findById('');

    expect($actual)->toBeInstanceOf(Category::class);
});
