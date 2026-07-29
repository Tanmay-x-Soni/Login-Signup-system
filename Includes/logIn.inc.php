<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

$identifier = trim($_POST["username"]);
$password = $_POST["password"];

    
        try {
            require "dbh.inc.php";
            require_once __DIR__ . '/MVC_logIn/login_model.inc.php';
            require_once __DIR__ . '/MVC_logIn/login_contr.inc.php';

            $login_errors =[];

            if(is_input_empty($identifier , $password)){
                $login_errors['empty_input'] ="Fill in all the fields!";
            }

            if(is_identifier_incorrect($pdo , $identifier )){
                $login_errors['incorrect_username'] = "Username or Email is incorrect!";
            } elseif(is_password_incorrect($pdo , $identifier , $password)){
                $login_errors['incorrect_password'] = "Password is incorrect!";
            }

             require_once '../Includes/config_sessions.inc.php';

             if($login_errors){
                $_SESSION["login_errors"] = $login_errors;
                $loginData = [
                    "username" => $identifier
                ];
                $_SESSION["login_data"] = $loginData;
                header("Location: ../logIn.php");
                die();
             }
            
            $userData = get_user_data_login($pdo, $identifier);
            if($userData){
                $_SESSION["username"] = $userData["USERNAME"];
                $_SESSION["email"] = $userData["EMAIL"];
                $_SESSION["id"] = $userData["ID"];
                $_SESSION["created_at"] = $userData["CREATED_AT"];
            }

            unset($_SESSION["login_data"]);
            unset($_SESSION["login_errors"]);

             header("Location: ../dashboard.php");
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
