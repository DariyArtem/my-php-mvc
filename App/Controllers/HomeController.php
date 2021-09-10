<?php


namespace App\Controllers;


use App\Models\DB;
use Core\Controller;

class HomeController extends Controller
{

    public function index(){

        $this->render('Home',[DB::select("SELECT * FROM `users`")]);
    }

}