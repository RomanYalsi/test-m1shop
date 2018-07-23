<?php

namespace Project\Core;

class Router
{
    public static function run (array $params)
    {
        $namespace      = 'Project\App\Controllers\\';
        $mainController = $namespace . 'Blog';
        $controllerPath = APP_PATH . 'Controllers/';
        $controllerName = ucfirst($params['name']);

        if (is_file($controllerPath . $controllerName . '.php'))
        {
            $controllerName = $namespace . $controllerName;
            $controller     = new $controllerName;

            if ((new \ReflectionClass($controller))->hasMethod($params['action']) && (new \ReflectionMethod($controller, $params['action']))->isPublic()) {
                call_user_func(array($controller, $params['action']));
            }
            else {
                call_user_func(array($controller, 'notFound'));
            }
        }
        else {
            call_user_func(array(new $mainController, 'notFound'));
        }
    }
}