<?php 
declare(strict_types=1);

function get_identifier_login(object $pdo , string $identifier){

    $query = "SELECT USERNAME FROM accounts WHERE USERNAME = :identifier OR EMAIL = :identifier;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":identifier" , $identifier);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function get_password_login(object $pdo , string $identifier){
    
    $query = "SELECT PASSWORD FROM accounts WHERE USERNAME = :identifier OR EMAIL = :identifier;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":identifier" , $identifier);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result["PASSWORD"] : false;
}

function get_user_data_login(object $pdo , string $identifier){
    $query = "SELECT ID, USERNAME, EMAIL , CREATED_AT FROM accounts WHERE USERNAME = :identifier OR EMAIL = :identifier;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":identifier" , $identifier);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}