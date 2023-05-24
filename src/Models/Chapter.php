<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Chapter extends Data
{
    public function __construct(
        public string $audio_preview_url,
        public array $available_markets,
        public int $chapter_number,
        public string $description,
        public string $html_description,
        public int $duration_ms,
        public bool $explicit,
        public ExternalUrls $external_urls,
        public string $href,
        public string $id,
        #[DataCollectionOf(Image::class)]
        public array $images,
        public bool $is_playable,
        public array $languages,
        public string $name,
        public string $release_date,
        public string $release_date_precision,
        public ResumePoint $resume_point,
        public string $type,
        public string $uri,
        public Restrictions $restrictions,
    ) {}
}
