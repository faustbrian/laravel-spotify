<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

abstract readonly class AbstractReference
{
    public function __construct(private Client $client)
    {
        //
    }

    public function withToken(string $token): void
    {
        $this->client->withToken($token);
    }

    protected function get(string $path, array $query = []): Response
    {
        return $this->client->get($path, [], $query);
    }

    protected function delete(string $path, array $query = []): Response
    {
        return $this->client->delete($path, [], $query);
    }

    protected function patch(string $path, array $body, array $query = []): Response
    {
        return $this->client->patch($path, $body, $query);
    }

    protected function post(string $path, array $body, array $query = []): Response
    {
        return $this->client->post($path, $body, $query);
    }

    protected function put(string $path, array $body, array $query = []): Response
    {
        return $this->client->put($path, $body, $query);
    }

    protected function concat(array $items): string
    {
        return \implode(',', $items);
    }
}
