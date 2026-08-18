<?php

declare(strict_types=1);

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: ../logIn.php");
    exit();
}

// DB connection and dashboard MVC
require_once __DIR__ . '/dbh.inc.php';
require_once __DIR__ . '/MVC_dashboard/dashboard_contr.inc.php';
require_once __DIR__ . '/MVC_dashboard/dashboard_view.inc.php';

$userId = (int) $_SESSION["id"];

// Expose combined account + profile data to including pages
$dashboardData = get_dashboard_data($pdo, $userId);

?>