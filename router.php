<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort(int $code = 404){
    http_response_code($code);

    echo "sorry page not found";

    die();
}

$routes = [
    '/' => 'controllers/index.php',
    '/stats' => 'controllers/stats.php',

    '/create-demo-account' => 'controllers/users/create.php',
    '/login' => 'controllers/users/login.php',
];

if (array_key_exists($uri, $routes)){
    require $routes[$uri];
}else{
    http_response_code(404);

    echo "sorry page not found";

    die();
}
