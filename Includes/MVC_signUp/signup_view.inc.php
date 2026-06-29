<?php

declare(strict_types=1);

function get_signup_errors(){
    if(isset($_SESSION["signup_errors"])){ 
        $errors = $_SESSION["signup_errors"];
        unset($_SESSION["signup_errors"]);
        return $errors;
    }

    return [];
}

function signup_username_input($errors = []){
    $value = '';

    if(isset($_SESSION["signup_data"]["username"]) && !isset($errors["username_taken"])){
        $value = htmlspecialchars($_SESSION["signup_data"]["username"], ENT_QUOTES, 'UTF-8');
        echo '<input type="text" name="username" placeholder="Your username" value="' . $value . '">';
    }
    else {
        echo '<input type="text" name="username" placeholder="Your username">';
    }

    if(!isset($errors["empty_input"]) && (isset($errors["username_taken"]))){
        $message = "Username already exists!";
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function signup_email_input($errors = []){
    $value = '';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($errors["email_used"]) && !isset($errors["invalid_email"])){
        $value = htmlspecialchars($_SESSION["signup_data"]["email"], ENT_QUOTES, 'UTF-8');
        echo '<input type="email" name="email" placeholder="you@example.com" value="' . $value . '">';
    } else {
        echo '<input type="email" name="email" placeholder="you@example.com">';
    }

    if(!isset($errors["empty_input"]) && (isset($errors["invalid_email"]) || isset($errors["email_used"]))){
        if(isset($errors["email_used"])){ 
            $message = "Email already registered!";
        } else {
            $message = "Please enter a valid email address.";
        }

        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}

function signup_password_input($errors = []){
    echo '<input type="password" name="password" placeholder="Create a password">';

    if(isset($errors["empty_input"])){
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">'.$errors["empty_input"].'</p>';
    } elseif(isset($errors["weak_password"])){
        $message = $errors["weak_password"];
        echo '<p class="field-error" style="margin:2px 0 0;color:#d93025;font-size:0.82rem;font-weight:600;line-height:1.2;display:block;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    }
}


