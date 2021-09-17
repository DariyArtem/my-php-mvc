<?php

namespace App\Controllers;
use App\Models\DB;
use Core\Controller;


class LikeController extends HomeController {
    public function index(){
        $postid = $_POST['postid'];
        $type = $_POST['type'];
        $userid = $_SESSION["user"]['id'];
        $this->checkTable($postid,$userid,$type);
        $total_likes = $this->countTotalLikes($postid);
        $total_dislikes = $this->countTotalDislikes($postid);
        $return_arr = array("likes"=>$total_likes,"unlikes"=>$total_dislikes);
        echo json_encode($return_arr);
    }
}