<?php

declare(strict_types=1);

require_once __DIR__ . '/../dbh.inc.php';
require_once __DIR__ . '/../MVC_profile/profile_model.inc.php';

function get_dashboard_data(object $pdo, int $userId): array
{
    $query = "SELECT ID, USERNAME, EMAIL, CREATED_AT FROM accounts WHERE ID = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $userId, PDO::PARAM_INT);
    $statement->execute();
    $account = $statement->fetch(PDO::FETCH_ASSOC) ?: [];

    $profile = get_profile_data($pdo, $userId) ?: [];

    return array_merge($account, $profile);
}

?>
?>