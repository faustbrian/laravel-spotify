<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Search extends AbstractReference
{
    public function album(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'album',
            'query' => $query,
        ])->json();
    }

    public function artist(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'artist',
            'query' => $query,
        ])->json();
    }

    public function audiobook(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'audiobook',
            'query' => $query,
        ])->json();
    }

    public function episode(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'episode',
            'query' => $query,
        ])->json();
    }

    public function playlist(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'playlist',
            'query' => $query,
        ])->json();
    }

    public function show(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'show',
            'query' => $query,
        ])->json();
    }

    public function track(string $query, array $context = []): array
    {
        return $this->client->get('search', [
            ...$context,
            'type' => 'track',
            'query' => $query,
        ])->json();
    }
}
