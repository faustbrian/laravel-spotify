<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Facades;

use BaseCodeOy\Spotify\Reference\Albums;
use BaseCodeOy\Spotify\Reference\Artists;
use BaseCodeOy\Spotify\Reference\Audiobooks;
use BaseCodeOy\Spotify\Reference\Categories;
use BaseCodeOy\Spotify\Reference\Chapters;
use BaseCodeOy\Spotify\Reference\Episodes;
use BaseCodeOy\Spotify\Reference\Genres;
use BaseCodeOy\Spotify\Reference\Markets;
use BaseCodeOy\Spotify\Reference\Player;
use BaseCodeOy\Spotify\Reference\Playlists;
use BaseCodeOy\Spotify\Reference\Search;
use BaseCodeOy\Spotify\Reference\Shows;
use BaseCodeOy\Spotify\Reference\Tracks;
use BaseCodeOy\Spotify\Reference\Users;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Albums     albums()
 * @method static Artists    artists()
 * @method static Audiobooks audiobooks()
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
 */
final class Spotify extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'spotify';
    }
}
