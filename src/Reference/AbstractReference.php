<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

abstract readonly class AbstractReference
{
    public function __construct(protected Client $client)
    {
        //
    }

    public function withToken(string $token): void
    {
        $this->client->withToken($token);
    }

    protected function concat(array $items): string
    {
        return \implode(',', $items);
    }
}
