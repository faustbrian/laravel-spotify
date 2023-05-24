<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify\Reference;

use Illuminate\Http\Client\Response;

final readonly class Markets extends AbstractReference
{
    public function all(array $context = []): Response
    {
        return $this->get('markets', $context);
    }
}
