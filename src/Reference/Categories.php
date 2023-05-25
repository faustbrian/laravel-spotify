<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Category;
use BombenProdukt\Spotify\Models\CategoryPage;

final readonly class Categories extends AbstractReference
{
    public function all(array $context = []): CategoryPage
    {
        return CategoryPage::from($this->get('browse/categories', $context)->json('categories'));
    }

    public function findById(string $id, array $context = []): Category
    {
        return Category::from($this->get("/browse/categories/{$id}", $context)->json());
    }
}
