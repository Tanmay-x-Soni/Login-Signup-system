<?php

require_once __DIR__ . '/Includes/dashboard.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="Style/dashboard.css?v=2">

</head>


<body>

    <div class="container">

        <?php
        dashboard_render_profile_card($dashboardData);
        ?>

    </div>

</body>

</html>