<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password , string $email){

if(empty($username) || empty($password) || empty($email)){
    return true;
} else {
    return false;
}
}

function is_email_invalid(string $email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo , string $username){
    if(get_username($pdo , $username)){
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo , string $email){
    if(get_email($pdo , $email)){
        return true;
    } else {
        return false;
    }
}

function is_password_weak(string $password): string|false{
    if(strlen($password) < 8){
        return "Password must be at least 8 characters long!";
    }

    // preg match checks whether a pattern exists or not  ex :- preg_match('/abc/',"xxabcxx");  returns 1
    // here it checks if the password has atleast one special character
    if(!preg_match('/[^A-Za-z0-9]/', $password)){
        return "Password must contain at least one special character!";
    }
    // here it checks if password have atleast one number
    if(!preg_match('/\d/', $password)){
        return "Password must contain at least one number!";
    }

    return false;
}


function create_user(object $pdo , string $username , string $password ,string $email)
{

        set_user($pdo ,$username , $password , $email);

}