<?php

namespace Router;

use App\Controllers\ScrapingController;

class Route
{

    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $params = explode('@', $this->action);

        $ns = "App\\Controllers\\".$params[0];

        $controller = new $ns();

        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}

















// $params = explode('@', $this->action);
// $controller = new ScrapingController;
// // $controller = new $params[0]();
// $method = $params[1];
// var_dump(
// call_user_func($controller)
// );
// return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
// }
