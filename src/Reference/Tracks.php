<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\AudioAnalysis;
use BaseCodeOy\Spotify\Models\AudioFeature;
use BaseCodeOy\Spotify\Models\Recommendations;
use BaseCodeOy\Spotify\Models\SavedTrackPage;
use BaseCodeOy\Spotify\Models\Track;
use Spatie\LaravelData\DataCollection;

final readonly class Tracks extends AbstractReference
{
    public function findById(string $id, array $context = []): Track
    {
        return Track::from($this->get("tracks/{$id}", $context)->json());
    }

    /**
     * @return DataCollection<Track>
     */
    public function findByIds(array $ids, array $context = []): DataCollection
    {
        return Track::collection(
            $this->get('tracks', [
                ...$context,
                'ids' => $this->concat($ids),
            ])->json('tracks'),
        );
    }

    public function savedByCurrentUser(array $context = []): SavedTrackPage
    {
        return SavedTrackPage::from($this->get('me/tracks', $context)->json());
    }

    public function saveToCurrentUser(array $ids): bool
    {
        return $this->put('me/tracks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function deleteFromCurrentUser(array $ids): bool
    {
        return $this->delete('me/tracks', [
            'ids' => $this->concat($ids),
        ])->status() === 200;
    }

    public function checkSavedByCurrentUser(array $ids): array
    {
        return $this->combine(
            $ids,
            $this->get('me/tracks/contains', [
                'ids' => $this->concat($ids),
            ])->json(),
        );
    }

    /**
     * @return DataCollection<AudioFeature>
     */
    public function audioFeatures(array $context = []): DataCollection
    {
        return AudioFeature::collection($this->get('audio-features', $context)->json('audio_features'));
    }

    public function audioFeature(string $id, array $context = []): AudioFeature
    {
        return AudioFeature::from($this->get("audio-features/{$id}", $context)->json());
    }

    public function audioAnalysis(string $id, array $context = []): AudioAnalysis
    {
        return AudioAnalysis::from($this->get("audio-analysis/{$id}", $context)->json());
    }

    public function recommendations(array $context = []): Recommendations
    {
        return Recommendations::from($this->get('recommendations', $context)->json());
    }
}
