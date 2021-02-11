<?php

use App\Controllers\ScrapingController;
use Router\Router;

require "../vendor/autoload.php";

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR );
define('DB_NAME', 'scraping');
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PWD', 'root'); 

$router = new Router($_GET['url']);

$router->get('/home', 'ScrapingController@home');
$router->get('/scrap', 'ScrapingController@scraping');
$router->get('/history', 'ScrapingController@history');
$router->get('/scrap/:id', 'ScrapingController@show');

$router->run();