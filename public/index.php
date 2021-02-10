<?php

use App\Controllers\ScrapingController;
use Router\Router;

require "../vendor/autoload.php";

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR );

$router = new Router($_GET['url']);

$router->get('/home', 'ScrapingController@home');
$router->get('/scrap', 'ScrapingController@scraping');
$router->get('/history', 'ScrapingController@history');
$router->get('/scrap/:id', 'ScrapingController@show');

$router->run();