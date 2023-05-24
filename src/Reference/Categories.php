<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models;

final readonly class Categories extends AbstractReference
{
    public function all(array $context = []): Models\Categories
    {
        return Models\Categories::from($this->get('browse/categories', $context)->json('categories'));
    }

    public function findById(string $id, array $context = []): Models\Category
    {
        return Models\Category::from($this->get("/browse/categories/{$id}", $context)->json());
    }
}
