<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

final readonly class Genres extends AbstractReference
{
    public function seeds(array $context = []): array
    {
        return $this->get('recommendations/available-genre-seeds', $context)->json('genres');
    }
}
