<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'medirecords' => [
        'sandbox' => env('MEDIRECORDS_SANDBOX', false),
        'api_url' => env('MEDIRECORDS_API_URL'),
        'api_access_token' => env('MEDIRECORDS_API_ACCESS_TOKEN'),
        'api_refresh_token' => env('MEDIRECORDS_API_REFRESH_TOKEN'),
        'fhir_access_token' => env('MEDIRECORDS_FHIR_ACCESS_TOKEN'),
        'fhir_refresh_token' => env('MEDIRECORDS_FHIR_REFRESH_TOKEN'),
        'practice_guid' => env('MEDIRECORDS_PRACTICE_GUID'),
        'user_id' => env('MEDIRECORDS_USER_ID'),
    ],

];
