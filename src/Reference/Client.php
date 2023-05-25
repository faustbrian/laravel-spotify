<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use RuntimeException;

final class Client
{
    private PendingRequest $client;

    public function __construct(private readonly array $config)
    {
        $this->client = Http::baseUrl('https://api.spotify.com/v1')->withHeaders([
            'Content-Type' => 'application/json',
            'Accepts' => 'application/json',
        ]);
    }

    public function withToken(string $token): self
    {
        $this->client = $this->client->withToken($token);

        return $this;
    }

    public function get(string $path, array $query = []): Response
    {
        return $this->request('get', $path, [], $query);
    }

    public function delete(string $path, array $query = []): Response
    {
        return $this->request('delete', $path, [], $query);
    }

    public function patch(string $path, array $body, array $query = []): Response
    {
        return $this->request('patch', $path, $body, $query);
    }

    public function post(string $path, array $body, array $query = []): Response
    {
        return $this->request('post', $path, $body, $query);
    }

    public function put(string $path, array $body, array $query = []): Response
    {
        return $this->request('put', $path, $body, $query);
    }

    private function request(string $method, string $path, array $body, array $query): Response
    {
        /**
         * @var Response
         */
        $response = $this->client
            ->withOptions(['query' => $query])
            ->{$method}($path, $body);

        if (\is_array($response->json('error'))) {
            throw new RuntimeException(
                message: (string) $response->json('error.message'),
                code: (int) $response->json('error.status'),
            );
        }

        return $response->throw();
    }
}
