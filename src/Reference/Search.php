<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Search extends AbstractReference
{
    public function album(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'album',
            'query' => $query,
        ]);
    }

    public function artist(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'artist',
            'query' => $query,
        ]);
    }

    public function audiobook(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'audiobook',
            'query' => $query,
        ]);
    }

    public function episode(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'episode',
            'query' => $query,
        ]);
    }

    public function playlist(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'playlist',
            'query' => $query,
        ]);
    }

    public function show(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'show',
            'query' => $query,
        ]);
    }

    public function track(string $query, array $context = []): Response
    {
        return $this->get('search', [
            ...$context,
            'type' => 'track',
            'query' => $query,
        ]);
    }
}
