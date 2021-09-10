<?php

namespace Core;

use App\Controllers\HomeController;

class Router
{
    protected $routes = [];

    protected $params = [];

    public function add($route, $params = [])
    {

        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;

    }

    public function match($url){
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                    $this->params = $params;
                    return true;
                }
            }
        }
        return false;
    }

    public function dispatch($url){
        $url = $this->removeQueryStringVariable($url);
        if($this->match($url)){
            $controller = $this->getNamespace() . $this->params['controller'] . 'Controller';

            if (class_exists($controller)) {
                $controller_object = new $controller();
                $action = $this->params['action'];
               if (preg_match('/$action/', $action) == 0) {
                    $controller_object->$action();
                } else {
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception('No route matched.', 404);

        }
    }

    protected function removeQueryStringVariable($url){
        $url = ltrim("$url", '/');
        if($url != ' ') {

            $parts = explode('?', $url);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = ' ';
            }
        }
        return $url;
    }
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }




}