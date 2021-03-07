<?php

use App\Exceptions\NotFoundException;
use Router\Router;

require "../vendor/autoload.php";

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']). DIRECTORY_SEPARATOR );
define('DB_NAME', 'scraping');
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PWD', 'root');

$router = new Router($_GET['url']);

//Get
$router->get('/home', 'ScrapingController@home');
$router->get('/scrap', 'ScrapingController@scraping');
$router->get('/history', 'ScrapingController@history');
$router->get('/scrap/:id', 'ScrapingController@show');
$router->get('/category/:id', 'ScrapingController@category');
$router->get('/admin/scraping', 'AdminScrapController@scraping');
$router->get('/admin/scraping/edit/:id', 'AdminScrapController@edit');
$router->get('/admin/scraping/new', 'AdminScrapController@new');
$router->get('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');

//Post
$router->post('/admin/scraping/edit/:id', 'AdminScrapController@update');
$router->post('/admin/scraping/delete/:id', 'AdminScrapController@delete');
$router->post('/admin/scraping/new', 'AdminScrapController@newScrap');
$router->post('/login', 'UserController@loginPost');

try {
    $router->run();
} catch (NotFoundException $e) {
    echo $e->error404();
}
