<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

final class Audiobook extends Data
{
    public function __construct(
        #[DataCollectionOf(Author::class)]
        public array $authors,
        public array $available_markets,
        #[DataCollectionOf(Copyright::class)]
        public array $copyrights,
        public string $description,
        public string $html_description,
        public string $edition,
        public bool $explicit,
        public ExternalUrls $external_urls,
        public string $href,
        public string $id,
        #[DataCollectionOf(Image::class)]
        public array $images,
        public array $languages,
        public string $media_type,
        public string $name,
        #[DataCollectionOf(Narrator::class)]
        public array $narrators,
        public string $publisher,
        public string $type,
        public string $uri,
        public int $total_chapters,
        public Chapters $chapters,
    ) {}
}
