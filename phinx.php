<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

require_once __DIR__ . '/app/Helpers/functions.php';

return [
    'paths' => [
        'migrations' => 'database/migrations',
        'seeds' => 'database/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => env('DB_DRIVER'),
            'host' => env('DB_HOST'),
            'name' => env('DB_NAME'),
            'user' => env('DB_USER'),
            'pass' => env('DB_PASS'),
            'port' => env('DB_PORT')
        ],
    ],
];
