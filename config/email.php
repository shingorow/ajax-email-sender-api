<?php

return [
    'driver' => $_ENV['EMAIL_DRIVER'] ?? 'smtp',
    'host' => $_ENV['EMAIL_HOST'] ?? '',
    'port' => $_ENV['EMAIL_PORT'] ?? 25,
    'auth' => $_ENV['EMAIL_AUTH'] ?? false,
    'username' => $_ENV['EMAIL_USERNAME'] ?? '',
    'password' => $_ENV['EMAIL_PASSWORD'] ?? '',
    'from' => $_ENV['EMAIL_FROM'] ?? '',
    'fromName' => $_ENV['EMAIL_FROM_NAME'] ?? '',
    'subject' => $_ENV['EMAIL_SUBJECT'] ?? '',
];
