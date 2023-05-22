<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Facades;

use BombenProdukt\Spotify\Reference\Albums;
use BombenProdukt\Spotify\Reference\Artists;
use BombenProdukt\Spotify\Reference\Audibooks;
use BombenProdukt\Spotify\Reference\Categories;
use BombenProdukt\Spotify\Reference\Chapters;
use BombenProdukt\Spotify\Reference\Episodes;
use BombenProdukt\Spotify\Reference\Genres;
use BombenProdukt\Spotify\Reference\Markets;
use BombenProdukt\Spotify\Reference\Player;
use BombenProdukt\Spotify\Reference\Playlists;
use BombenProdukt\Spotify\Reference\Search;
use BombenProdukt\Spotify\Reference\Shows;
use BombenProdukt\Spotify\Reference\Tracks;
use BombenProdukt\Spotify\Reference\Users;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Albums     albums()
 * @method static Artists    artists()
 * @method static Audibooks  audibooks()
 * @method static Categories categories()
 * @method static Chapters   chapters()
 * @method static Episodes   episodes()
 * @method static Genres     genres()
 * @method static Markets    markets()
 * @method static Player     player()
 * @method static Playlists  playlists()
 * @method static Search     search()
 * @method static Shows      shows()
 * @method static Tracks     tracks()
 * @method static Users      users()
 * @method static void       withToken(string $token)
 */
final class Spotify extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'spotify';
    }
}
