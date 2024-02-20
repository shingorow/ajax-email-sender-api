<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Usecase\Email;

require_once 'bootstrap.php';

final class EmailTest extends TestCase
{
    function testEmailValidate(): void
    {
        $email = new Email();
        $validateFailed1 = $email->validate(['name' => 'michael']);
        $this->assertFalse($validateFailed1);

        $validateFailed2 = $email->validate(['email' => '']);
        $this->assertFalse($validateFailed2);

        $validateFailed3 = $email->validate(['email' => 'michael@test.']);
        $this->assertFalse($validateFailed3);

        $validateSuccess = $email->validate(['email' => 'user@sample.test']);
        $this->assertTrue($validateSuccess);
    }

    function testCreateMessage(): void
    {
        $email = new Email();
        $requestBody = [
            'name' => 'michael',
            'email' => 'test@example.com',
        ];
        $templateName = 'autoreply';

        $message = $email->createMessage($requestBody, $templateName);
        var_dump($message);
        $this->assertStringContainsString('michael', $message);
    }

    function testSend(): void
    {
        $email = new Email();
        $requestBody = [
            'to' => 'customer@example.test',
            'subject' => 'Test reply mail',
            'message' => 'This is a test mail.',
        ];
        $result = $email->send($requestBody['to'], $requestBody['subject'], $requestBody['message']);
        $this->assertTrue($result);
    }
}
