<?php

// GUZZLE usage

require __DIR__ . "/vendor/autoload.php";

$client = new GuzzleHttp\Client;

$response = $client->request("GET", "https://api.github.com/user/repos", [
    "headers" => [
        "Authorization" => "token Your_token",
        "user-Agent" => "wingo-dev"
    ]
]);


echo $response->getStausCode() . "\n";

echo $response->getHeader("content-type")[0] . "\n";

echo substr($response->getBody(), 0, 200) . "\n";
