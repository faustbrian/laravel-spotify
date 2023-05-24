<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Episode;
use BombenProdukt\Spotify\Models\EpisodeSavedByCurrentUserResponse;
use Spatie\LaravelData\DataCollection;

final readonly class Episodes extends AbstractReference
{
    public function findById(string $id, array $context = []): Episode
    {
        return Episode::from($this->get("episodes/{$id}", $context)->json());
    }

    /**
     * @return DataCollection<Episode>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Episode::collection(
            $this->get('episodes', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('episodes'),
        );
    }

    public function savedByCurrentUser(array $context = []): EpisodeSavedByCurrentUserResponse
    {
        return EpisodeSavedByCurrentUserResponse::from($this->get('me/episodes', $context)->json());
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/episodes', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/episodes', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/episodes/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }
}
