<?php 



$DSN = "mysql:host=127.0.0.1:3307;dbname=login-signup";
$dbUsername = "root";
$dbPassword = "";

try {

    $pdo = new PDO($DSN , $dbUsername , $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection Failed : " . $e->getmessage();
}