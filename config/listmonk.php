<?php

return [
    'endpoint' => env('LISTMONK_ENDPOINT', 'https://mail.example.com'),
    'api' => [
        'user' => env('LISTMONK_API_USER', 'api-user'),
        'token' => env('LISTMONK_API_TOKEN', 'api-secret'),
    ],
];
