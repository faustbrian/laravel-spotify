<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Spatie\LaravelData\Data;

final class Device extends Data
{
    public ?string $id;

    public bool $is_active;

    public bool $is_private_session;

    public bool $is_restricted;

    public string $name;

    public string $type;

    public ?int $volume_percent;
}
