<?php

$ch = curl_init();

$headers = [
    "Authorization: Bearer API key"
];

$payload = [
    "name" => "create from API",
    "description" => "an example api-created repo"
];

curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "https://api.github.com/repos/wingo-dev/Delos",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_USERAGENT => "wingo-dev",
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $payload
    ]
);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo $status_code;

echo $response;


curl_close($ch);