<?php


namespace Core;


class Controller
{

    public function render($view, $data = []){
        extract($data);
        $file = dirname(__DIR__) . "/App/Views/" . strtoupper($view) . ".php";
        if(is_readable($file)){
            require $file;
        } else {
            throw new \Exception("$file not found");
        }

    }

}