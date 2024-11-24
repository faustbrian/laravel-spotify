<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Reference;

use BaseCodeOy\Spotify\Models\AlbumPage;
use BaseCodeOy\Spotify\Models\ArtistPage;
use BaseCodeOy\Spotify\Models\AudiobookPage;
use BaseCodeOy\Spotify\Models\EpisodePage;
use BaseCodeOy\Spotify\Models\PlaylistPage;
use BaseCodeOy\Spotify\Models\SearchResult;
use BaseCodeOy\Spotify\Models\ShowPage;
use BaseCodeOy\Spotify\Models\TrackPage;

final readonly class Search extends AbstractReference
{
    public function search(array $types, string $query, array $context = []): SearchResult
    {
        return SearchResult::from(
            $this->get('search', [
                ...$context,
                'type' => $this->concat($types),
                'q' => $query,
            ])->json(),
        );
    }

    public function album(string $query, array $context = []): AlbumPage
    {
        return AlbumPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'album',
                'q' => $query,
            ])->json('albums'),
        );
    }

    public function artist(string $query, array $context = []): ArtistPage
    {
        return ArtistPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'artist',
                'q' => $query,
            ])->json('artists'),
        );
    }

    public function audiobook(string $query, array $context = []): AudiobookPage
    {
        return AudiobookPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'audiobook',
                'q' => $query,
            ])->json('audiobooks'),
        );
    }

    public function episode(string $query, array $context = []): EpisodePage
    {
        return EpisodePage::from(
            $this->get('search', [
                ...$context,
                'type' => 'episode',
                'q' => $query,
            ])->json('episodes'),
        );
    }

    public function playlist(string $query, array $context = []): PlaylistPage
    {
        return PlaylistPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'playlist',
                'q' => $query,
            ])->json('playlists'),
        );
    }

    public function show(string $query, array $context = []): ShowPage
    {
        return ShowPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'show',
                'q' => $query,
            ])->json('shows'),
        );
    }

    public function track(string $query, array $context = []): TrackPage
    {
        return TrackPage::from(
            $this->get('search', [
                ...$context,
                'type' => 'track',
                'q' => $query,
            ])->json('tracks'),
        );
    }
}
