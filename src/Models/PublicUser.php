<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class PublicUser extends Data
{
    public ?string $display_name;

    public ExternalUrls $external_urls;

    public ?Followers $followers;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public ?DataCollection $images;

    public string $type;

    public string $uri;
}
