<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\Chapter;
use Spatie\LaravelData\DataCollection;

final readonly class Chapters extends AbstractReference
{
    public function findById(string $id, array $context = []): Chapter
    {
        return Chapter::from($this->get("chapters/{$id}", $context)->json());
    }

    /**
     * @return DataCollection<Chapter>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Chapter::collection(
            $this->get('chapters', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('chapters'),
        );
    }
}
