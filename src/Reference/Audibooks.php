<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Audibooks extends AbstractReference
{
    public function findById(string $id, array $context = []): Response
    {
        return $this->client->get("audibooks/{$id}", $context);
    }

    public function findByIds(array $ids, array $context = []): Response
    {
        return $this->client->get('audibooks', [
            ...$context,
            'ids' => \implode(',', $ids),
        ]);
    }

    public function chapters(string $id, array $context = []): Response
    {
        return $this->client->get("audibooks/{$id}/chapters", $context);
    }

    public function savedByCurrentUser(array $context = []): Response
    {
        return $this->client->get('me/audibooks', $context);
    }

    public function saveToCurrentUser(array $ids): Response
    {
        return $this->client->put('me/audibooks', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function deleteFromCurrentUser(array $ids): Response
    {
        return $this->client->delete('me/audibooks', [
            'ids' => \implode(',', $ids),
        ]);
    }

    public function checkSavedByCurrentUser(array $ids): Response
    {
        return $this->client->get('me/audibooks/contains', [
            'ids' => \implode(',', $ids),
        ]);
    }
}
