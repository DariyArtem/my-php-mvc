<?php


namespace App\Controllers;


use App\Models\DB;
use Core\Controller;

class LoginController extends Controller
{
    public function index(){


        $this->render('Login');

    }

    public function logInUser(){
        if (isset($_POST["login-submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "Check validation of Email";
                $this->redirect('login');
                exit();
            }
            $sql = "SELECT * FROM `users` WHERE `email` = :email";
            $data = [
                "email" => $email,
            ];
            $user = DB::select($sql,$data);
            if (!$user){
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "User with this email is not found";
                $this->redirect('login');
                exit();
            } else if(password_verify($password, $user["password"]) !== true){
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "Password incorrect";
                $this->redirect('login');
                exit();
            } else{
                $_SESSION["auth"] = true;
                $_SESSION["user"] = [
                    "id" => $user["id"],
                    "username" => $user["username"],
                    "email" => $user["email"]
                ];
                $this->redirect('profile');
            }

        }

    }
}