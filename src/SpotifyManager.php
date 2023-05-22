<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify;

use BombenProdukt\Manager\AbstractManager;

final class SpotifyManager extends AbstractManager
{
    protected function createConnection(array $config): object
    {
        return new Spotify($config);
    }

    protected function getConfigName(): string
    {
        return 'spotify';
    }
}
