<?php
require_once './config/routes.php';

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

$basePath = 'skillspark';
if (strpos($requestUri, $basePath) === 0) {
    $request = substr($requestUri, strlen($basePath) + 1);
} else {
    $request = $requestUri;
}

// echo "Request Path: " . $request . "<br>";


if (array_key_exists($request, $routes)) {
    include "./views/{$routes[$request]}";
} else {
    http_response_code(404);
    echo "404 Not Found";
}
