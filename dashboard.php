<?php
require_once __DIR__ . '/Includes/dashboard.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<link rel="stylesheet" href="Style/dashboard.css">

</head>

<body>

<div class="container">

<div class="topbar">

<h2>My Dashboard</h2>

<a href="logout.php" class="logout-btn">
Logout
</a>

<a href="completeProfile.php" class="logout-btn">
Edit
</a>
</div>


<?php dashboard_render_profile_card($dashboardData); ?>

</body>
</html>