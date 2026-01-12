<?php
header("Content-Type: application/json");

// CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

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