<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/routes.php';
