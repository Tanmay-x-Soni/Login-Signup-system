<?php 

declare(strict_types=1);

function is_input_empty(string $username, string $password){
    if(empty($username) || empty($password)){
        return true;
    }
    else {
        return false;
    }
}

function is_username_incorrect(object $pdo , string $username ){

        if(!get_username_login($pdo , $username)){
            return true;
        }
        else{
            return false;
        }
}

function is_password_incorrect(object $pdo , string $username , string $password){

        $D_password = get_password_login($pdo , $username);

        if(!$D_password || !password_verify($password , $D_password)){
            return true;
        }
        else{
            return false;
        }
}