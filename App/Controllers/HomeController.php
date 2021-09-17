<?php


namespace App\Controllers;

use PDO;

use App\Models\DB;
use Core\Controller;

class HomeController extends Controller
{

    public function index(){

        $this->render('Home');

    }

    public function perehod(){
        $this->redirect('main');
    }

    public function logout(){
        $_SESSION["auth"] = false;
        unset($_SESSION['user']);
        $this->redirect('login');
    }

    public function getAllUploads(){
        $sql = "SELECT * FROM images ORDER BY rand()";
        $images = DB::selectAll($sql);
        return $images;

    }

    public function checkUserStatus($postid){
        $id = $_SESSION["user"]["id"];
        $data = [
            'userid' => $id,
            'postid' => $postid
        ];
        $type = -1;
        $sql = "SELECT count(*) AS type FROM like_unlike WHERE userid = :userid AND postid = :postid";
        $status_row = DB::select($sql, $data);
        $count_status = $status_row;
        if($count_status > 0){
            $type = $status_row['type'];
        }
        return $type;

    }

    public function countTotalLikes($postid){
        $sql = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid = :postid";
        $data = [
            'postid' => $postid
        ];
        $like_result = DB::select($sql, $data);
        $total_likes = $like_result['cntLikes'];
        return $total_likes;
    }

    public function countTotalDislikes($postid){
        $sql = "SELECT COUNT(*) AS cntDislikes FROM like_unlike WHERE type = 0 and postid = :postid";
        $data = [
            'postid' => $postid
        ];
        $unlike_result = DB::select($sql, $data);
        $total_dislikes = $unlike_result['cntDislikes'];
        return $total_dislikes;
    }

    public function checkTable($postid, $userid, $type)
    {

        $sql = "SELECT COUNT(*) AS cntpost FROM like_unlike WHERE postid = :postid and userid = :userid";
        $data = [
            'postid' => $postid,
            'userid' => $userid
        ];
        $fetched_data = DB::select($sql, $data);
        $count = $fetched_data['cntpost'];

        if ($count == 0) {
            $sql = "INSERT INTO like_unlike(userid,postid,type) values(:userid,:postid,:type)";
            $data = [
                'postid' => $postid,
                'userid' => $userid,
                'type' => $type
            ];
            $query = DB::insert($sql, $data);

        } else {
            $sql = "UPDATE like_unlike SET type = $type  where userid = $userid  and postid = $postid";
            $data = [
                'postid' => $postid,
                'userid' => $userid
            ];
            $query = DB::update($sql, $data);
        }

    }
}