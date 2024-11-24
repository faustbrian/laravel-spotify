<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

final readonly class Genres extends AbstractReference
{
    public function seeds(array $context = []): array
    {
        return $this->get('recommendations/available-genre-seeds', $context)->json('genres');
    }
}
