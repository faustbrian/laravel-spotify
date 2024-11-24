<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\EpisodePage;
use BaseCodeOy\Spotify\Models\SavedShowPage;
use BaseCodeOy\Spotify\Models\Show;
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
        return $this->combine(
            $ids,
            $this->get('me/shows/contains', [
                'ids' => $this->concat($ids),
            ])->json(),
        );
    }
}
