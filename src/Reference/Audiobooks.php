<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\Audiobook;
use BombenProdukt\Spotify\Models\AudiobookChaptersResponse;
use BombenProdukt\Spotify\Models\AudiobookSavedByUserResponse;
use Spatie\LaravelData\DataCollection;

final readonly class Audiobooks extends AbstractReference
{
    public function findById(string $id, array $context = []): Audiobook
    {
        return Audiobook::fromResponse($this->get("audiobooks/{$id}", $context));
    }

    /**
     * @return DataCollection<Audiobook>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Audiobook::collection(
            $this->get('audiobooks', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('audiobooks'),
        );
    }

    public function chapters(string $id, array $context = []): AudiobookChaptersResponse
    {
        return AudiobookChaptersResponse::fromResponse($this->get("audiobooks/{$id}/chapters", $context));
    }

    public function savedByCurrentUser(array $context = []): AudiobookSavedByUserResponse
    {
        return AudiobookSavedByUserResponse::fromResponse($this->get('me/audiobooks', $context));
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/audiobooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/audiobooks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->get('me/audiobooks/contains', [
            'ids' => $this->concat($ids),
        ])->json();
    }
}
