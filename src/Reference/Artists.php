<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Artists extends AbstractReference
{
    public function findById(string $id): Response
    {
        return $this->client->get("artists/{$id}");
    }

    public function findByIds(array $ids): Response
    {
        return $this->client->get('artists', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function albums(string $id, array $context = []): Response
    {
        return $this->client->get("artists/{$id}/albums", $context);
    }

    public function topTracks(string $id, array $context = []): Response
    {
        return $this->client->get("artists/{$id}/top-tracks", $context);
    }

    public function relatedArtists(string $id): Response
    {
        return $this->client->get("artists/{$id}/related-artists");
    }
}
