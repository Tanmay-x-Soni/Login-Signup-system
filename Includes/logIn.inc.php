<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST["username"];
$password = $_POST["password"];

    if (empty($username) || empty($password)) {
        header("Location: ../logIn.php");
        exit();
    } else {
        try {
            require "dbh.inc.php";

            $query = "SELECT * FROM accounts WHERE USERNAME = :username;";
            $statement = $pdo->prepare($query);
            $statement->bindParam(":username", $username);
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            $pdo = null;
            $statement = null;

            if ($result && password_verify($password, $result['PASSWORD'])) {
                header("Location: ../logInResults.php");
                exit();
            } else {
                header("Location: ../logIn.php");
                exit();
            }

        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }
}