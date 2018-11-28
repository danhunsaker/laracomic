<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'deviantart' => [
        'client_id' => env('DEVIANTART_KEY'),
        'client_secret' => env('DEVIANTART_SECRET'),
        'redirect' => env('DEVIANTART_REDIRECT_URI')
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_KEY'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI')
    ],

    'google' => [
        'client_id' => env('GOOGLE_KEY'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI')
    ],

    'instagram' => [
        'client_id' => env('INSTAGRAM_KEY'),
        'client_secret' => env('INSTAGRAM_SECRET'),
        'redirect' => env('INSTAGRAM_REDIRECT_URI')
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'patreon' => [
        'client_id' => env('PATREON_KEY'),
        'client_secret' => env('PATREON_SECRET'),
        'redirect' => env('PATREON_REDIRECT_URI')
    ],

    'pinterest' => [
        'client_id' => env('PINTEREST_KEY'),
        'client_secret' => env('PINTEREST_SECRET'),
        'redirect' => env('PINTEREST_REDIRECT_URI')
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'tumblr' => [
        'client_id' => env('TUMBLR_KEY'),
        'client_secret' => env('TUMBLR_SECRET'),
        'redirect' => env('TUMBLR_REDIRECT_URI')
    ],

    'twitter' => [
        'client_id' => env('TWITTER_KEY'),
        'client_secret' => env('TWITTER_SECRET'),
        'redirect' => env('TWITTER_REDIRECT_URI')
    ],

];
