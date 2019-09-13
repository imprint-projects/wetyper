<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    */

    'default' => 'default',

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    */

    'channels' => [
        'default' => [
            'driver' => 'daily',
            'path'   => storage_path('logs/wetyper.log'),
            'level'  => 'info',
            'days'   => 30,
        ],

        'event' => [
            'driver' => 'daily',
            'path'   => storage_path('logs/event.log'),
            'level'  => 'info',
            'days'   => 30,
        ]
    ],
];