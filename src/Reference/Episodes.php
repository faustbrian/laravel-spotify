<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\Episode;
use BaseCodeOy\Spotify\Models\SavedEpisodePage;
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

    public function savedByCurrentUser(array $context = []): SavedEpisodePage
    {
        return SavedEpisodePage::from($this->get('me/episodes', $context)->json());
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
        return $this->combine(
            $ids,
            $this->get('me/episodes/contains', [
                'ids' => $this->concat($ids),
            ])->json(),
        );
    }
}
