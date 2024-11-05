<?php

declare(strict_types=1);

use BaseCodeOy\Spotify\Reference\Client;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\DataCollection;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

uses(
    Tests\TestCase::class,
)->in('Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

expect()->extend('toBePage', function (string $page, string $model): void {
    expect($this->value)->toBeInstanceOf($page);
    expect($this->value->items)->toBeInstanceOf(DataCollection::class);
    expect($this->value->items->first())->toBeInstanceOf($model);
});

expect()->extend('toBeDataCollection', function (string $model): void {
    expect($this->value)->toBeInstanceOf(DataCollection::class);
    expect($this->value->first())->toBeInstanceOf($model);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function fixture(string $path): string
{
    return \file_get_contents(\realpath(__DIR__."/fixtures/{$path}.json"));
}

function fakeOkFromFixture(string $fqcn, string $path)
{
    Http::fakeSequence()->push(fixture("reference/{$path}"), 200);

    return new $fqcn(new Client([]));
}

function fakeOk(string $fqcn, array $response)
{
    Http::fakeSequence()->push($response, 200);

    return new $fqcn(new Client([]));
}

function fakeCreated(string $fqcn, array $response)
{
    Http::fakeSequence()->push($response, 201);

    return new $fqcn(new Client([]));
}

function fakeNoContent(string $fqcn)
{
    Http::fakeSequence()->push(null, 204);

    return new $fqcn(new Client([]));
}

function fakeUnauthorized(string $fqcn)
{
    Http::fakeSequence()->push([
        'error' => [
            'status' => 401,
            'message' => 'string',
        ],
    ], 401);

    return new $fqcn(new Client([]));
}

function fakeForbidden(string $fqcn)
{
    Http::fakeSequence()->push([
        'error' => [
            'status' => 403,
            'message' => 'string',
        ],
    ], 403);

    return new $fqcn(new Client([]));
}

function fakeTooManyRequests(string $fqcn)
{
    Http::fakeSequence()->push([
        'error' => [
            'status' => 429,
            'message' => 'string',
        ],
    ], 429);

    return new $fqcn(new Client([]));
}
