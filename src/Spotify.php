<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify;

use BombenProdukt\Spotify\Reference\Albums;
use BombenProdukt\Spotify\Reference\Artists;
use BombenProdukt\Spotify\Reference\Audibooks;
use BombenProdukt\Spotify\Reference\Categories;
use BombenProdukt\Spotify\Reference\Chapters;
use BombenProdukt\Spotify\Reference\Client;
use BombenProdukt\Spotify\Reference\Episodes;
use BombenProdukt\Spotify\Reference\Genres;
use BombenProdukt\Spotify\Reference\Markets;
use BombenProdukt\Spotify\Reference\Player;
use BombenProdukt\Spotify\Reference\Playlists;
use BombenProdukt\Spotify\Reference\Search;
use BombenProdukt\Spotify\Reference\Shows;
use BombenProdukt\Spotify\Reference\Tracks;
use BombenProdukt\Spotify\Reference\Users;

final readonly class Spotify
{
    private readonly Client $client;

    public function __construct(private readonly array $config)
    {
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

    public function audibooks(): Audibooks
    {
        return new Audibooks($this->client);
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
