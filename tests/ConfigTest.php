<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Core\Config;
use Dotenv\Dotenv;

final class ConfigTest extends TestCase
{
    function testConfigGet(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();
        Config::setConfigDirectory(__DIR__ . '/../config');
        $config = Config::get('email.host');
        $this->assertIsString($config);
    }
}
