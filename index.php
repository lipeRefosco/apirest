<?php

header('Content-Type: application/json;');

require_once "vendor/autoload.php";

use App\Infra\Router;

Router::handler(
    $_GET,
    $_SERVER,
    $_REQUEST
);

Router::go();

// var_dump($_GET);
// var_dump($_SERVER);
// var_dump($_REQUEST);
