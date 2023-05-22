<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Markets extends AbstractReference
{
    public function all(array $context = []): array
    {
        return $this->client->get('markets', $context)->json();
    }
}
