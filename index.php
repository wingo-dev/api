<?php

declare(strict_types=1);

require dirname(__DIR__) . "\api\src\ErrorHandler.php";
require dirname(__DIR__) . "\api\src\Database.php";

ini_set("display_errors", "On");

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parts = explode("/", $path);

$resource = $parts[2];

$id = $parts[3] ?? null;

// echo $resource, ", ", $id;

// echo $_SERVER["REQUEST_METHOD"], "\n";

if ($resource != "tasks") {
    // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    http_response_code(404);
    exit;
}
header("Content-type: application/json; charset=UTF-8");

$db = new Database("localhost", "root", "", "gopizzago");


require dirname(__DIR__) . "\api\src\TaskController.php";
// echo dirname(__DIR__) . "\api\src\TaskController.php";

$controller = new TaskController;

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);

$payload = ["username" => "david", "id" => 1];

$access_token = base64_encode(json_encode($payload));

echo $access_token . "<br>";

echo base64_decode($access_token);

$headers = apache_request_headers();

echo $headers["Authorization"];
