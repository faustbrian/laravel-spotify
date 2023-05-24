<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\AlbumSearchResponse;
use BombenProdukt\Spotify\Models\ArtistSearchResponse;
use BombenProdukt\Spotify\Models\AudiobookSearchResponse;
use BombenProdukt\Spotify\Models\EpisodeSearchResponse;
use BombenProdukt\Spotify\Models\PlaylistSearchResponse;
use BombenProdukt\Spotify\Models\SearchResponse;
use BombenProdukt\Spotify\Models\ShowSearchResponse;
use BombenProdukt\Spotify\Models\TrackSearchResponse;

final readonly class Search extends AbstractReference
{
    public function search(array $types, string $query, array $context = []): SearchResponse
    {
        return SearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => $this->concat($types),
                'query' => $query,
            ])->json(),
        );
    }

    public function album(string $query, array $context = []): AlbumSearchResponse
    {
        return AlbumSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'album',
                'query' => $query,
            ])->json('albums'),
        );
    }

    public function artist(string $query, array $context = []): ArtistSearchResponse
    {
        return ArtistSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'artist',
                'query' => $query,
            ])->json('artists'),
        );
    }

    public function audiobook(string $query, array $context = []): AudiobookSearchResponse
    {
        return AudiobookSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'audiobook',
                'query' => $query,
            ])->json('audiobooks'),
        );
    }

    public function episode(string $query, array $context = []): EpisodeSearchResponse
    {
        return EpisodeSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'episode',
                'query' => $query,
            ])->json('episodes'),
        );
    }

    public function playlist(string $query, array $context = []): PlaylistSearchResponse
    {
        return PlaylistSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'playlist',
                'query' => $query,
            ])->json('playlists'),
        );
    }

    public function show(string $query, array $context = []): ShowSearchResponse
    {
        return ShowSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'show',
                'query' => $query,
            ])->json('shows'),
        );
    }

    public function track(string $query, array $context = []): TrackSearchResponse
    {
        return TrackSearchResponse::from(
            $this->get('search', [
                ...$context,
                'type' => 'track',
                'query' => $query,
            ])->json('tracks'),
        );
    }
}
