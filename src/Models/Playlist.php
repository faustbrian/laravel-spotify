<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Data;

final class Playlist extends Data
{
    public bool $collaborative;

    public ?string $description;

    public ExternalUrls $external_urls;

    public ?Followers $followers;

    public string $href;

    public string $id;

    public array $images;

    public string $name;

    public PublicUser $owner;

    public bool $public;

    public ?string $snapshot_id;

    public ?PlaylistTracks $tracks;

    public string $type;

    public string $uri;
}
