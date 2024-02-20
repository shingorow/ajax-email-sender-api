<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Controller\FormController;

$app->get('/email-key', function (Request $request, Response $response) {
    $emailKey = $_ENV['INPUT_EMAIL_NAME'];
    $response->getBody()->write(json_encode(['emailKey' => $emailKey]));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/submission', FormController::class . ':post');


