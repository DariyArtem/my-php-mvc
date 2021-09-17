<?php


namespace App\Controllers;


use App\Models\DB;
use Core\Controller;

class ProfilesController extends Controller
{
    public function index(){

        $this->render('Profiles');

    }

    public function getUser(){
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = ["id" => $id];
        $query = DB::select($sql, $params);
        return $query;

    }

    public function getSomebodyUploads(){
        $userid = $_GET['id'];
        $sql = "SELECT * FROM images WHERE userid = :userid ORDER BY id DESC";
        $params = ["userid" => $userid];
        $query = DB::selectAll($sql, $params);
        return $query;

    }
}