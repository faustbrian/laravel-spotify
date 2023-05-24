<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

final class Audiobook extends AbstractModel
{
    public function __construct(
        #[DataCollectionOf(Author::class)]
        public readonly DataCollection $authors,
        public readonly array $available_markets,
        #[DataCollectionOf(Copyright::class)]
        public readonly DataCollection $copyrights,
        public readonly string $description,
        public readonly string $html_description,
        public readonly string $edition,
        public readonly bool $explicit,
        public readonly ExternalUrls $external_urls,
        public readonly string $href,
        public readonly string $id,
        #[DataCollectionOf(Image::class)]
        public readonly DataCollection $images,
        public readonly array $languages,
        public readonly string $media_type,
        public readonly string $name,
        #[DataCollectionOf(Narrator::class)]
        public readonly DataCollection $narrators,
        public readonly string $publisher,
        public readonly string $type,
        public readonly string $uri,
        public readonly int $total_chapters,
        public readonly Chapters $chapters,
    ) {}
}
