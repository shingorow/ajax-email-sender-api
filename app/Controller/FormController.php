<?php

namespace App\Controller;

use Core\Config;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Usecase\Email;

class FormController
{
    public function post(Request $request, Response $response)
    {
        $requestBody = $request->getParsedBody();
        $email = new Email();
        $validation = $email->validate($requestBody);
        if (!$validation) {
            $response->getBody()->write(json_encode(['error' => 'Email addres is invalid'], JSON_UNESCAPED_UNICODE));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
        $message = $email->createMessage($requestBody, 'autoreply');
        $to = $requestBody['email'];
        $subject = Config::get('email.subject');
        $result = $email->send($to, $subject, $message);

        $notificationMessage = $email->createMessage($requestBody, 'notification');
        $notifyTo = $requestBody['email'];
        $notifySubject = Config::get('email.subject');
        $result = $email->send($to, $subject, $message);

        $status = $result ? 200 : 500;
        return $response
            ->withStatus($status);
    }
}
