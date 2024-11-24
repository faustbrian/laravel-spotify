<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Spotify;

use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteManager;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('spotify', fn (Container $app): SpotifyManager => new SpotifyManager($app['config']));
    }

    public function packageBooted(): void
    {
        /** @var SocialiteManager $socialite */
        $socialite = $this->app->make(Factory::class);

        $socialite->extend(
            'spotify',
            fn (Application $application) => $socialite->buildProvider(
                Socialite\Provider::class,
                $application->config->get('services.spotify'),
            ),
        );
    }

    public function provides(): array
    {
        return ['spotify'];
    }
}
