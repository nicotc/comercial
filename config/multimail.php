<?php

return [
    /*
    |--------------------------------------------------------------------------
    | List your email providers
    |--------------------------------------------------------------------------
    |
    | Enjoy a life with multimail
    |
    */
    'use_default_mail_facade_in_tests' => true,

    'emails'  => [
        'aitor.gonzalez@ag10moto.com' => [
            'pass'          => 'Aitor0000-',
            'username'      => 'aitor.gonzalez@ag10moto.com',
            'from_name'     => 'Aitor González',
        ],
        'vendedor1@ag10moto.com' => [
            'pass'          => env('MAIL_PASSWORD'),
            'username'      => env('MAIL_USERNAME'),
            'from_name'     => 'Max Musterman',
        ],
        'vendedor2@ag10moto.com' => [
            'pass'          => env('MAIL_PASSWORD'),
            'username'      => env('MAIL_USERNAME'),
            'from_name'     => 'Max Musterman',
        ],
    ],

    'provider' => [
        'default' => [
            'host'      => env('MAIL_HOST'),
            'port'      => env('MAIL_PORT'),
            'encryption' => env('MAIL_ENCRYPTION'),
        ],
    ],

];
