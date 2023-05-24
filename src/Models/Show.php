<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Show extends Data
{
    public function __construct(
        public array $available_markets,
        #[DataCollectionOf(Copyright::class)]
        public array $copyrights,
        public string $description,
        public string $html_description,
        public bool $explicit,
        public ExternalUrls $external_urls,
        public string $href,
        public string $id,
        #[DataCollectionOf(Image::class)]
        public array $images,
        public bool $is_externally_hosted,
        public array $languages,
        public string $media_type,
        public string $name,
        public string $publisher,
        public string $type,
        public string $uri,
        public int $total_episodes,
        public Episodes $episodes,
    ) {}
}
