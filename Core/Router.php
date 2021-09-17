<?php

namespace Core;

use App\Controllers\HomeController;

class Router
{

    protected $params = [];


    public function dispatch($url){
        $url = $this->removeQueryStringVariable($url);
        $route  = explode('/', $url);
        if($route[0] == ''){
            $controller = $this->getNamespace() . 'MainController';
        }
        else {
                $controller = $this->getNamespace() . $route[0] . 'Controller';
            }
        if (class_exists($controller)) {
                $controller_object = new $controller();
                if(is_null($route[1])){
                    $action = 'index';
                    $controller_object->$action();
                } else{
                    $action = $route[1];
                    $controller_object->$action();
                }
            }
    }

    public function removeQueryStringVariable($url){
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