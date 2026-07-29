<?php 

declare(strict_types=1);

function is_input_empty(string $identifier, string $password){
    if(empty($identifier) || empty($password)){
        return true;
    }
    else {
        return false;
    }
}

function is_identifier_incorrect(object $pdo , string $identifier ){

        if(!get_identifier_login($pdo , $identifier)){
            return true;
        }
        else{
            return false;
        }
}

function is_password_incorrect(object $pdo , string $identifier , string $password){

        $D_password = get_password_login($pdo , $identifier);

        if(!$D_password || !password_verify($password , $D_password)){
            return true;
        }
        else{
            return false;
        }
}