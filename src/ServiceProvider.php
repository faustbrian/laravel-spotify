<?php

declare(strict_types=1);

namespace BombenProdukt\Spotify;

use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Container\Container;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('spotify', fn (Container $app): SpotifyManager => new SpotifyManager($app['config']));
    }

    public function provides(): array
    {
        return ['spotify'];
    }
}
