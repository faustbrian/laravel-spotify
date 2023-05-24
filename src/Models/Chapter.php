<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class Chapter extends AbstractModel
{
    public function __construct(
        public readonly string $audio_preview_url,
        public readonly array $available_markets,
        public readonly int $chapter_number,
        public readonly string $description,
        public readonly string $html_description,
        public readonly int $duration_ms,
        public readonly bool $explicit,
        public readonly ExternalUrls $external_urls,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly DataCollection $images,
        public readonly bool $is_playable,
        public readonly array $languages,
        public readonly string $name,
        public readonly string $release_date,
        public readonly string $release_date_precision,
        public readonly ResumePoint $resume_point,
        public readonly string $type,
        public readonly string $uri,
        public readonly Restrictions $restrictions,
    ) {}
}
