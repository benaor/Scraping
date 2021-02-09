<?php

use App\Controllers\ScrapingController;
use Router\Router;

require "../vendor/autoload.php";

$router = new Router($_GET['url']);

$router->get('/scrap', 'ScrapingController@index');
$router->get('/scrap/:id', 'ScrapingController@show');

$router->run();