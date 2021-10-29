<?php

namespace App\Components;

class Router
{
    protected $routes;
    protected $params;
    public function __construct()
    {
        $this->methodcheck();
        $routesArray = include ROOT . "/config/routes.php";
        foreach ($routesArray as $rKey => $rValue) {
            $this->add($rKey, $rValue);
        }
    }

    public function add($route, $params)
    {
        $route = "@" . $route . "@";
        $this->routes[$route] = $params;
    }
    public function match()
    {
        $url = trim($_SERVER["REQUEST_URI"], "/");
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run()
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $this->methodcheck();
        }
        if ($this->match()) {
            $controllerPath = ROOT . "/controllers/" . ucfirst($this->params["controller"]) . "Controller.php";
            $ControllerName = ucfirst($this->params["controller"]) . "Controller";
            $ControllerName = "\App\Controllers\\" . $ControllerName;
            if (file_exists($controllerPath)) {
                $controllerAction = $this->params['action'] . "Action";
                if (method_exists($ControllerName, $controllerAction)) {
                    $controller = new $ControllerName($this->params);
                    $controller -> $controllerAction();
                } else {
                    echo "Method doesn't exist";
                    \App\View\View::errorCode(404);
                }
            } else {
                echo "File doesn't exist";
                \App\View\View::errorCode(404);
            }
        } else {
            echo "No match";
            \App\View\View::errorCode(404);
        }
    }
    public static function methodcheck()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
        switch ($method) {
            case 'POST':
                $_SESSION['POSTDATA'] = $_POST;
                break;
            case 'GET':
                $_SESSION['GETDATA'] = $_GET;
                break;
            default:
                handle_error($request);
                break;
        }
    }
}
