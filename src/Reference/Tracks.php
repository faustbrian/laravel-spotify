<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\AudioAnalysis;
use BombenProdukt\Spotify\Models\AudioFeature;
use BombenProdukt\Spotify\Models\Recommendations;
use BombenProdukt\Spotify\Models\SavedTrackPage;
use BombenProdukt\Spotify\Models\Track;
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
