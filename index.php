<?php
require 'App/Config/dbinfo.php';

spl_autoload_register(
    function ($class) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $ds = DIRECTORY_SEPARATOR;
        $filename = $root . $ds . str_replace('\\', $ds, $class) . '.php';
        require($filename);
    });


// \Core\Router::get('/', 'HomeController@showPage');
// \Core\Router::start();
$db = new \App\Models\DB();
//$result = $db::select("SELECT * FROM `users`");
//var_dump( $result[0] );


$a = new \Core\Router();
$a->add('', ['controller' => 'Home', 'action' => 'index']);
//$a->add('reg', ['controller' => 'Registration', 'action' => 'reg']);
$a->dispatch($_SERVER['REQUEST_URI']);






