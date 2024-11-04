<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Connections
    |--------------------------------------------------------------------------
    |
    | Here you may specify all of the connections for your application and
    | their respective settings. Example configuration has been included,
    | but you may add as many connections as you would like.
    |
    */

    'connections' => [
        'main' => [
            'clientId' => env('SPOTIFY_CLIENT_ID'),
            'clientSecret' => env('SPOTIFY_CLIENT_SECRET'),
        ],
    ],
];
