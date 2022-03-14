<?php

header('Content-Type: application/json; charset=utf-8');

use App\Infra\Router;
require_once "vendor/autoload.php";

Router::handler(
    $_GET,
    $_SERVER,
    $_REQUEST
);

Router::go();

// var_dump($_GET);
// var_dump($_SERVER);
// var_dump($_REQUEST);
