<?php

namespace Tests;


use Symfony\Component\Dotenv\Dotenv;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../.env');

        require_once __DIR__ . '/../vendor/autoload.php';
        require_once __DIR__ . '/../config/app.php';
    }
}