<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Categories extends AbstractReference
{
    public function all(array $context = []): Response
    {
        return $this->get('browse/categories', $context);
    }

    public function findById(string $id, array $context = []): Response
    {
        return $this->get("/browse/categories/{$id}", $context);
    }
}
