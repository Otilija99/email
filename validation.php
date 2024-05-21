<?php

echo 'Enter the email address: ';
$email = trim(fgets(STDIN));

$apiKey = 'secret';

$apiUrl = 'https://api.emailvalidation.io/v1/info?apikey=' . $apiKey . '&email=' . $email;

$response = file_get_contents($apiUrl);

if ($response === false) {
    echo 'Request Error: Unable to get data from the API.' . PHP_EOL;
    exit;
}

$responseData = json_decode($response);

if ($responseData !== null && isset($responseData->state)) {
    if ($responseData->state === 'deliverable') {
        echo "Email address '{$email}' is valid." . PHP_EOL;
    } else {
        echo "Email address '{$email}' is invalid." . PHP_EOL;
    }
} else {
    echo 'Failed to validate email address.' . PHP_EOL;
}