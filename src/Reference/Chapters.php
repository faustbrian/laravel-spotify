<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Chapters extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->get("chapters/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->get('chapters', [
            ...$context,
            'ids' => $this->concat($ids),
        ]);
    }
}
