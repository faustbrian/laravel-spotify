<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify;

use BaseCodeOy\Manager\AbstractManager;

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
