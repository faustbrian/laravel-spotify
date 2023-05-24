<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\AudioAnalysis;
use BombenProdukt\Spotify\Models\AudioFeature;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackRecommendationsResponse;
use BombenProdukt\Spotify\Models\TrackSavedByCurrentUserResponse;
use Spatie\LaravelData\DataCollection;

final readonly class Tracks extends AbstractReference
{
    public function findById(string $id, array $context = []): Track
    {
        return Track::fromResponse($this->get("tracks/{$id}", $context));
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

    public function savedByCurrentUser(array $context = []): TrackSavedByCurrentUserResponse
    {
        return TrackSavedByCurrentUserResponse::fromResponse($this->get('me/tracks', $context));
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
        return $this->get('me/tracks/contains', [
            'ids' => $this->concat($ids),
        ])->json();
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
        return AudioFeature::fromResponse($this->get("audio-features/{$id}", $context));
    }

    public function audioAnalysis(string $id, array $context = []): AudioAnalysis
    {
        return AudioAnalysis::fromResponse($this->get("audio-analysis/{$id}", $context));
    }

    public function recommendations(array $context = []): TrackRecommendationsResponse
    {
        return TrackRecommendationsResponse::fromResponse($this->get('recommendations', $context));
    }
}
