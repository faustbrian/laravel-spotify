<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

final class Episode extends Data
{
    public ?string $audio_preview_url;

    public string $description;

    public string $html_description;

    public int $duration_ms;

    public bool $explicit;

    public ExternalUrls $external_urls;

    public string $href;

    public string $id;

    #[DataCollectionOf(Image::class)]
    public DataCollection $images;

    public ?bool $is_externally_hosted;

    public bool $is_playable;

    public string $language;

    public array $languages;

    public string $name;

    public string $release_date;

    public string $release_date_precision;

    public ResumePoint $resume_point;

    public string $type;

    public string $uri;

    public Restrictions $restrictions;
}
