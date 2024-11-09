<?php

require_once('../app/controllers/ProductController.php');

// Define routes
$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case '/':
        $controller = new ProductController();
        $controller -> index();
        break;
    case '/create':
        $controller = new ProductController();
        $controller -> create();
        break;
    default:
        // Handle 404 error
        break;
}