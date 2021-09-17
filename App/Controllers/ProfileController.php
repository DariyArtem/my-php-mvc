<?php


namespace App\Controllers;

use App\Models\DB;
use http\Params;
use PDO;
use Core\Controller;

class ProfileController extends Controller

{

    public function index(){
        $this->render('Profile');
    }

    public function logout(){
        $_SESSION["auth"] = false;
        unset($_SESSION['user']);
        $this->redirect('login');
    }

    public function getUserUploads(){

        $sql = "SELECT * FROM `images` WHERE userid = :userid ORDER BY id DESC";
        $params = [
            "userid" => $_SESSION["user"]["id"]
        ];
        $images = DB::selectAll($sql, $params);
        return $images;

    }

    public function uploadImage(){
        if(isset($_POST["upload"])){
            $sql = "INSERT INTO `images` (name, image, userid) VALUES (?,?,?)";
            $filename = $_FILES['file']['name'];
            $target_file = 'uploads/'.$filename;
            $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            $valid_extension = array("png","jpeg","jpg");

            if(in_array($file_extension, $valid_extension)){
                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    $params = array($filename,$target_file,$_SESSION["user"]["id"]);
                    $image = DB::insert($sql, $params);
                }
            }

        }
        $this->redirect('profile');
    }

    public function delete(){
        $id = $_GET['id'];
        $sql = "DELETE FROM `images` WHERE id = :id";
        $params = [
          "id" => $id
        ];
        $result = DB::delete($sql, $params);
        $this->redirect('profile');
    }

}