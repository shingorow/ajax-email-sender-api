<?php

use Dotenv\Dotenv;
use Core\Config;

require_once __DIR__ . "/../vendor/autoload.php";

try {
    Config::setConfigDirectory(__DIR__ . "/../config/");
    $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
    $dotenv->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
    echo ".env for test is missing.";
    exit(1);
}
