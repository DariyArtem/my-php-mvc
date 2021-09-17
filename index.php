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
$db = new \App\Models\DB();
$a = new \Core\Router();
$a->dispatch($_SERVER['REQUEST_URI']);







