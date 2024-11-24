<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify;

use BaseCodeOy\Spotify\Reference\Albums;
use BaseCodeOy\Spotify\Reference\Artists;
use BaseCodeOy\Spotify\Reference\Audiobooks;
use BaseCodeOy\Spotify\Reference\Categories;
use BaseCodeOy\Spotify\Reference\Chapters;
use BaseCodeOy\Spotify\Reference\Client;
use BaseCodeOy\Spotify\Reference\Episodes;
use BaseCodeOy\Spotify\Reference\Genres;
use BaseCodeOy\Spotify\Reference\Markets;
use BaseCodeOy\Spotify\Reference\Player;
use BaseCodeOy\Spotify\Reference\Playlists;
use BaseCodeOy\Spotify\Reference\Search;
use BaseCodeOy\Spotify\Reference\Shows;
use BaseCodeOy\Spotify\Reference\Tracks;
use BaseCodeOy\Spotify\Reference\Users;

final readonly class Spotify
{
    private readonly Client $client;

    public function __construct(
        private readonly array $config,
    ) {
        $this->client = new Client($config);
    }

    public function albums(): Albums
    {
        return new Albums($this->client);
    }

    public function artists(): Artists
    {
        return new Artists($this->client);
    }

    public function audiobooks(): Audiobooks
    {
        return new Audiobooks($this->client);
    }

    public function categories(): Categories
    {
        return new Categories($this->client);
    }

    public function chapters(): Chapters
    {
        return new Chapters($this->client);
    }

    public function episodes(): Episodes
    {
        return new Episodes($this->client);
    }

    public function genres(): Genres
    {
        return new Genres($this->client);
    }

    public function markets(): Markets
    {
        return new Markets($this->client);
    }

    public function player(): Player
    {
        return new Player($this->client);
    }

    public function playlists(): Playlists
    {
        return new Playlists($this->client);
    }

    public function search(): Search
    {
        return new Search($this->client);
    }

    public function shows(): Shows
    {
        return new Shows($this->client);
    }

    public function tracks(): Tracks
    {
        return new Tracks($this->client);
    }

    public function users(): Users
    {
        return new Users($this->client);
    }
}
