<?php


namespace App\Controllers;


use App\Models\DB;
use Core\Controller;
use Core\Router;

class RegistrationController extends Controller
{
    public function index()
    {
        $this->render('Register');
    }

    public function addUser(){
        if (isset($_POST["submit_add_user"])) {
            $sql1 = "SELECT * FROM users WHERE email = :email";
            $email = $_POST['email'];
            $email_check = '';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];
            $user_check = DB::selectAll($sql1, ['email' => $email]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "Check validation of Email";
                $this->redirect('registration');
                exit();
            }else if($password !== $password_confirmation){
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "Passwords mismatch";
                $this->redirect('registration');
                exit();
            }else if(!empty($user_check)){
                $_SESSION['is_error'] = true;
                $_SESSION['error_message'] = "The email you entered is already taken";
                $this->redirect('registration');
                exit();
            } else{
                $sql2 = "INSERT INTO `users` (`email`, `username`, `password`) 
                                    VALUES (:email, :username, :password)";
                $params = [
                    'email' => $_POST["email"],
                    'username' => $_POST["username"],
                    'password' => password_hash($_POST["password"], PASSWORD_DEFAULT)
                ];
               $query = DB::insert($sql2, $params);
                $_SESSION['is_success_register'] = true;
                $_SESSION['success_message'] = "Registration is complete. Log in using the form below ";
                $this->redirect('login');
            }
        }
    }
}
