<?php
require 'App/Config/dbinfo.php';
session_start();
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
//$a->add('', ['controller' => 'Main', 'action' => 'index']);
//$a->add('registration', ['controller' => 'Registration', 'action' => 'index']);
//$a->add('profile', ['controller' => 'Profile','action' => 'index']);
//$a->add('login', ['controller' => 'Login', 'action' => 'index']);
//$a->add('home', ['controller' => 'Home', 'action' => 'index']);
//$a->add('other', ['controller' => 'OtherProfiles', 'action' => 'index']);
$a->dispatch($_SERVER['REQUEST_URI']);







