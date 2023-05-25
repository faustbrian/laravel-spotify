<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use BombenProdukt\Spotify\Models\AlbumPage;
use BombenProdukt\Spotify\Models\ArtistPage;
use BombenProdukt\Spotify\Models\AudiobookPage;
use BombenProdukt\Spotify\Models\EpisodePage;
use BombenProdukt\Spotify\Models\PlaylistPage;
use BombenProdukt\Spotify\Models\SearchResult;
use BombenProdukt\Spotify\Models\ShowPage;
use BombenProdukt\Spotify\Models\TrackPage;

final readonly class Search extends AbstractReference
{
    public function search(array $types, string $query, array $context = []): SearchResult
    {
        return SearchResult::from(
            $this->get('search', [
                ...$context,
                'type' => $this->concat($types),
                'query' => $query,
            ])->json(),
        );
    }

    public function album(string $query, array $context = []): AlbumPage
    {
        return AlbumPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'album',
                'query' => $query,
            ])->json('albums'),
        );
    }

    public function artist(string $query, array $context = []): ArtistPage
    {
        return ArtistPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'artist',
                'query' => $query,
            ])->json('artists'),
        );
    }

    public function audiobook(string $query, array $context = []): AudiobookPage
    {
        return AudiobookPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'audiobook',
                'query' => $query,
            ])->json('audiobooks'),
        );
    }

    public function episode(string $query, array $context = []): EpisodePage
    {
        return EpisodePage::from(
            $this->get('search', [
                ...$context,
                'type' => 'episode',
                'query' => $query,
            ])->json('episodes'),
        );
    }

    public function playlist(string $query, array $context = []): PlaylistPage
    {
        return PlaylistPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'playlist',
                'query' => $query,
            ])->json('playlists'),
        );
    }

    public function show(string $query, array $context = []): ShowPage
    {
        return ShowPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'show',
                'query' => $query,
            ])->json('shows'),
        );
    }

    public function track(string $query, array $context = []): TrackPage
    {
        return TrackPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'track',
                'query' => $query,
            ])->json('tracks'),
        );
    }
}
