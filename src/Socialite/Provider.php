<?php

declare(strict_types=1);

namespace BaseCodeOy\Spotify\Socialite;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User;

final class Provider extends AbstractProvider
{
    protected $scopeSeparator = ' ';

    protected function getAuthUrl($state): string
    {
        return $this->buildAuthUrlFromBase(
            'https://accounts.spotify.com/authorize',
            $state,
        );
    }

    protected function getTokenUrl(): string
    {
        return 'https://accounts.spotify.com/api/token';
    }

    protected function getUserByToken($token): array
    {
        return Http::withToken($token)
            ->get('https://api.spotify.com/v1/me')
            ->throw()
            ->json();
    }

    protected function mapUserToObject(array $user): User
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['id'],
            'nickname' => null,
            'name' => $user['display_name'],
            'email' => $user['email'] ?? null,
            'avatar' => Arr::get($user, 'images.0.url'),
            'profileUrl' => $user['href'] ?? null,
        ]);
    }

    protected function getTokenFields($code): array
    {
        return \array_merge(
            parent::getTokenFields($code),
            ['grant_type' => 'authorization_code'],
        );
    }
}
