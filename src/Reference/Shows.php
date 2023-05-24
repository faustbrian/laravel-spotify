<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Show;
use BombenProdukt\Spotify\Models\ShowEpisodesResponse;
use BombenProdukt\Spotify\Models\ShowSavedByCurrentUserResponse;
use Spatie\LaravelData\DataCollection;

final readonly class Shows extends AbstractReference
{
    public function findById(string $id, array $context = []): Show
    {
        return Show::fromResponse($this->get("shows/{$id}", $context));
    }

    /**
     * @return DataCollection<Show>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Show::collection(
            $this->get('shows', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('shows'),
        );
    }

    public function episodes(array $context = []): ShowEpisodesResponse
    {
        return ShowEpisodesResponse::fromResponse($this->get('shows', $context));
    }

    public function savedByCurrentUser(array $context = []): ShowSavedByCurrentUserResponse
    {
        return ShowSavedByCurrentUserResponse::fromResponse($this->get('me/shows', $context));
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/shows', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/shows', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/shows/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }
}
