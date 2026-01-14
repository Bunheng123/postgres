<?php
$allowedOrigins = [
    'http://localhost:5173',
    'http://localhost:5174',
    'http://localhost:3000'
];

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if (in_array($origin, $allowedOrigins)) {
    header("Access-Control-Allow-Origin: $origin");
}

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Your existing code...

require_once 'src/UserController.php';

$controller = new UserController();
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $controller->index();
}

if ($method === 'POST') {
    $controller->store();
}

if ($method === 'PUT') {
    $controller->update();
}

if ($method === 'DELETE') {
    $controller->destroy();
}