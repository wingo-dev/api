<?php

$ch = curl_init();


curl_setopt_array(
    $ch,
    [
        CURLOPT_URL => "",
        CURLOPT_RETURNTRANSFER => true
    ]
);

$response = curl_exec($ch);

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);