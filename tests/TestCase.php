<?php

declare(strict_types=1);

namespace Tests;

use BombenProdukt\PackagePowerPack\TestBench\AbstractPackageTestCase;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    protected function getRequiredServiceProviders(): array
    {
        return [
            \Spatie\LaravelData\LaravelDataServiceProvider::class,
        ];
    }

    protected function getServiceProviderClass(): string
    {
        return \BombenProdukt\Spotify\ServiceProvider::class;
    }
}
