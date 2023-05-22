<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Genres extends AbstractReference
{
    public function seeds(array $context = []): Response
    {
        return $this->client->get('recommendations/available-genre-seeds', $context);
    }
}
