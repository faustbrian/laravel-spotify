<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Genres extends AbstractReference
{
    public function seeds(array $context = []): array
    {
        return $this->client->get('recommendations/available-genre-seeds', $context)->json();
    }
}
