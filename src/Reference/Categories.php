<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Categories extends AbstractReference
{
    public function all(array $context = []): array
    {
        return $this->client->get('browse/categories', $context)->json();
    }

    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("/browse/categories/{$id}", $context)->json();
    }
}
