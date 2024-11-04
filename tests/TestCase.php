<?php

declare(strict_types=1);

namespace Tests;

use BaseCodeOy\PackagePowerPack\TestBench\AbstractPackageTestCase;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    protected function getRequiredServiceProviders(): array
    {
        return [
            \Laravel\Socialite\SocialiteServiceProvider::class,
            \Spatie\LaravelData\LaravelDataServiceProvider::class,
        ];
    }

    protected function getServiceProviderClass(): string
    {
        return \BaseCodeOy\Spotify\ServiceProvider::class;
    }
}
