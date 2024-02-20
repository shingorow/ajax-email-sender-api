<?php

namespace App\Usecase;

use PHPMailer\PHPMailer\PHPMailer;
use Core\Config;
use Exception;

class Email
{
    function validate(array $requestBody)
    {
        $emailAddress = array_key_exists('email', $requestBody) ? $requestBody['email'] : null;
        return $emailAddress && filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
    }

    function createMessage(array $requestBody, string $templateName)
    {
        $templateDir = __DIR__ . '/../../Templates/';
        $templatePath = $templateDir . $templateName . '.txt';
        $templateText = file_get_contents($templatePath);
        $message = $templateText;
        $requestItems = "";
        foreach ($requestBody as $key => $value) {
            $message = str_replace('{{' . $key . '}}', $value, $message);
            $requestItems .= "{$key}: {$value}\n";
        }

        $message = str_replace('{{itemList}}', $requestItems, $message);

        return trim($message);
    }

    function send(string $to, string $subject, string $message)
    {
        try {
            $phpmailer = new PHPMailer();
            $phpmailer->CharSet = 'UTF-8';
            $phpmailer->SMTPDebug = 3;
            $phpmailer->Debugoutput = function ($str, $level) {
                echo "debug level $level; message: $str\n";
            };
            $phpmailer->isSMTP();
            $phpmailer->Host = Config::get('email.host');
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = Config::get('email.port');
            $phpmailer->Username = Config::get('email.username');
            $phpmailer->Password = Config::get('email.password');

            $phpmailer->setFrom(Config::get('email.from'), Config::get('email.fromName'));
            $phpmailer->addAddress($to);

            $phpmailer->Subject = $subject;
            $phpmailer->Body = $message;

            $phpmailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
