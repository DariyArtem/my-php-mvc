<?php


namespace Core;


class Controller
{

    public function render($view){
        $file = dirname(__DIR__) . "/App/Views/" .$view . ".php";
        if(is_readable($file)){
            require $file;
        } else {
            throw new \Exception("$file not found");
        }


    }


    public function redirect($url){
        header("location: ../$url"  );
    }

}