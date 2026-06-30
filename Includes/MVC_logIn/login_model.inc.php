<?php 
declare(strict_types=1);

function get_username_login(object $pdo , string $username){

    $query = "SELECT USERNAME FROM accounts WHERE USERNAME = :username;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":username" , $username);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function get_password_login(object $pdo , string $password){
    
 $query = "SELECT PASSWORD FROM accounts WHERE PASSWORD = :password;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":password" , $password);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}