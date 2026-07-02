<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST["username"];
$password = $_POST["password"];

    
        try {
            require "dbh.inc.php";
            require_once __DIR__ . '/MVC_logIn/login_model.inc.php';
            require_once __DIR__ . '/MVC_logIn/login_contr.inc.php';

            $login_errors =[];

            if(is_input_empty($username , $password)){
                $login_errors['empty_input'] ="Fill in all the fields!";
            }

            if(is_username_incorrect($pdo , $username )){
                $login_errors['incorrect_username'] = "your username is incorrect!";
            }

            if(is_password_incorrect($pdo , $password)){
                $login_errors['incorrect_password'] = "Password is incorrect!";
            }

             require_once '../Includes/config_sessions.inc.php';

             if($login_errors){
                $_SESSION["login_errors"] = $login_errors;

                header("Location: ../logIn.php");
                die();
             }

             unset($_SESSION["login_errors"]);

             header("Location: ../logIn.php");
            $statement = null;
            $pdo = null;
            die();

           

        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
    else {
    header("Location: ../logIn.php");
        die();
}
