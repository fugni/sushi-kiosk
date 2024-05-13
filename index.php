<?php

declare(strict_types = 1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("errorHandler::handleError");
set_exception_handler("errorHandler::handleException");

header("Content-Type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER['REQUEST_URI']);

if ($parts[1] != "products") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

include "sql-credentials.php";

$database = new database($host, $db, $dbUser, $dbPass);

$gateway = new productGateway($database);

$controller = new productController($gateway);

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);