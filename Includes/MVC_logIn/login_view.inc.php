<?php

declare(strict_types=1);

function get_login_errors(){
    if(isset($_SESSION["login_errors"])){
        $errors = $_SESSION["login_errors"];
        unset($_SESSION["login_errors"]);

        return $errors;
    }

    return [];
}

function getUsername_input($errors = []){
    $value = '';

    if(isset($_SESSION["login_data"]["username"]) && !isset($errors["incorrect_username"]))
    {
        $value = htmlspecialchars($_SESSION["login_data"]["username"], ENT_QUOTES, 'UTF-8');
    }

    echo '<input type="text" name="username" placeholder="Enter Username" value="' . $value . '">';

    if (isset($errors["incorrect_username"])){
        $message = $errors["incorrect_username"];
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}



function getPassword_input($errors = []){
     echo '<input type="password" name="password" placeholder="Enter Password">';

    if(isset($errors["empty_input"])){
        $message = $errors["empty_input"];
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">'.$message.'</p>';
    } elseif(isset($errors["incorrect_password"])){
        $message = $errors["incorrect_password"];
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    }

}