<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\EpisodePage;
use BombenProdukt\Spotify\Models\SavedShowPage;
use BombenProdukt\Spotify\Models\Show;
use Spatie\LaravelData\DataCollection;

final readonly class Shows extends AbstractReference
{
    public function findById(string $id, array $context = []): Show
    {
        return Show::from($this->get("shows/{$id}", $context)->json());
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

    public function episodes(array $context = []): EpisodePage
    {
        return EpisodePage::from($this->get('shows', $context)->json());
    }

    public function savedByCurrentUser(array $context = []): SavedShowPage
    {
        return SavedShowPage::from($this->get('me/shows', $context)->json());
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
