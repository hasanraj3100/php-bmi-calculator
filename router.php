<?php

session_start(); 

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if($uri != "/login" && !isset($_SESSION['username']) && $uri != "/register") {
    header('Location: /login') ; 
}

$routes = [
    '/' => 'controllers/index.php',
    '/records' => 'controllers/records.php',
    '/login' => 'controllers/login.php',
    '/register' => 'controllers/register.php',
    '/result' => 'controllers/resultpage.php', 
    '/logout' => 'controllers/logout.php', 
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);