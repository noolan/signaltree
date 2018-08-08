<?php

require __DIR__ . '/vendor/autoload.php';

$env = new Dotenv\Dotenv('/var/www/');
$env->load();

use SendGrid, SendGrid\{Content, Email, Mail};
$from = new SendGrid\Email("Example User", "test@example.com");

$subject = "Sending with SendGrid is Fun";
$to = new SendGrid\Email("Example User", "test@example.com");
$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();
