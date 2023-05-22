<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

final readonly class Artists extends AbstractReference
{
    public function findById(string $id): array
    {
        return $this->client->get("artists/{$id}")->json();
    }

    public function findByIds(array $ids): array
    {
        return $this->client->get('artists', [
            'ids' => \implode(',', $ids),
        ])->json();
    }

    public function albums(string $id, array $context = []): array
    {
        return $this->client->get("artists/{$id}/albums", $context)->json();
    }

    public function topTracks(string $id, array $context = []): array
    {
        return $this->client->get("artists/{$id}/top-tracks", $context)->json();
    }

    public function relatedArtists(string $id): array
    {
        return $this->client->get("artists/{$id}/related-artists")->json();
    }
}
