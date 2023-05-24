<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Models;

use Illuminate\Http\Client\Response;
use Spatie\LaravelData\Data;

abstract class AbstractModel extends Data
{
    public static function fromResponse(Response $response): static
    {
        return static::from($response->json());
    }
}
