<?php

use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . '/../app/Helpers/functions.php';

$manager = new Manager();
$manager->addConnection([
    "driver"   => env('DB_DRIVER'),
    "host"     => env('DB_DRIVER'),
    "database" => env('DB_NAME'),
    "username" => env('DB_USER'),
    "password" => env('DB_PASS'),
]);

$manager->setAsGlobal();
$manager->bootEloquent();