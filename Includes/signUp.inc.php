<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

 $username = $_POST["username"];
 $password = $_POST["password"];
 $email = $_POST["email"];

 
    try{
        require_once __DIR__ . '/dbh.inc.php';
        require_once __DIR__ . '/MVC_signUp/signup_model.inc.php';
        require_once __DIR__ . '/MVC_signUp/signup_contr.inc.php';

        $errors = [];

        if(is_input_empty($username , $password , $email)){
            $errors['empty_input'] = "Fill in all the fields!";
        }
        
         if(is_email_invalid($email)){
            $errors['invalid_email'] = "Invalid email , Try again!!";
        }
        
         if(is_username_taken($pdo , $username)){
            $errors['username_taken'] = "Username already exists!";
        }
        
         if(is_email_registered($pdo , $email)){
            $errors['email_used'] = "Email already registered!";
        }


        $password_error = is_password_weak($password);
        if ($password_error) {
            $errors['weak_password'] = $password_error;
        }

        require_once '../Includes/config_sessions.inc.php';

        if($errors){
            $_SESSION["signup_errors"] = $errors;
            
            $signupData = [

                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../signUp.php");
            die();
        }
        
        unset($_SESSION["signup_data"]);
        unset($_SESSION["signup_errors"]);
        create_user($pdo, $username , $password , $email);

        

        header("Location: ../signUp.php");
        $statement = null;
        $pdo = null;
        die();

    } catch(PDOException $e){

        die("Querry Failed : " . $e->getMessage());

    }
 
} else {
    header("Location: ../signUp.php");
        die();
}