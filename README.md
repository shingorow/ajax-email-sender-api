# Ajax Email Sender API

This API is designed to receive POST requests from Ajax calls and send an email to the email address provided in the request body. It is built with PHP, utilizing the Slim 4 framework for handling HTTP requests, PHPMailer for email sending functionalities, and PHPDOTENV for managing environment variables.

## Features

- **Receive Ajax POST Requests:** Easily handle requests sent from client-side JavaScript using Ajax.
- **Send Emails:** Automatically send emails to the specified email address found in the POST request's body.
- **Environment Variables:** Use PHPDOTENV to securely manage sensitive information like SMTP credentials.

## Dependencies

- PHP 7.4 or higher
- [Slim 4 Framework](https://www.slimframework.com/)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [PHP dotenv](https://github.com/vlucas/phpdotenv)

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/yourgithubusername/ajax-email-sender-api.git
   ```

2. Navigate to the project directory:

   ```sh
   cd ajax-email-sender-api
   ```

3. Install dependencies via Composer:

   ```sh
   composer install
   ```

4. Copy `.env.example` to `.env` and fill in your SMTP settings and other environment variables:

   ```sh
   cp .env.example .env
   ```

5. Start your local server and test the API.

## Usage

Send a POST request to the API's endpoint with the following post body:

```json

"email": "recipient@example.com",
"subject": "Your Subject Here",
"message": "Your email message here."

```

## Contributing

Contributions, issues, and feature requests are welcome! Feel free to check [issues page](https://github.com/shingorow/ajax-email-sender-api/issues).

## License

Distributed under the MIT License.
