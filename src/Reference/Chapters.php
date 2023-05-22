<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Chapters extends AbstractReference
{
    public function findById(string $id, array $context = []): array
    {
        return $this->client->get("chapters/{$id}", $context)->json();
    }

    public function findByIds(array $ids, array $context = []): array
    {
        return $this->client->get('chapters', [
            ...$context,
            'ids' => \implode(',', $ids),
        ])->json();
    }
}
