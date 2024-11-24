<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\Category;
use BaseCodeOy\Spotify\Models\CategoryPage;

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
