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

final class Show extends Data
{
    public array $available_markets;

    #[DataCollectionOf(Copyright::class)]
    public DataCollection $copyrights;

    public string $description;

    public string $html_description;

    public bool $explicit;

    public ExternalUrls $external_urls;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public DataCollection $images;

    public bool $is_externally_hosted;

    public array $languages;

    public string $media_type;

    public string $name;

    public string $publisher;

    public string $type;

    public string $uri;

    public int $total_episodes;

    public ?EpisodePage $episodes;
}
