<?php
session_start();
require_once __DIR__ . '/Includes/MVC_profile/profile_view.inc.php';
$profile_errors = get_profile_errors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete profile</title>
    <link rel="stylesheet" href="Style/profileSetup.css?v=2">
</head>
<body>
     <main class="container">
        <form class="card" method="post" action="Includes/completeProfile.inc.php" novalidate >
                                    <!-- no validate means the browser will stop checking for input types  -->
            <h1 class="title">Complete Profile</h1>

            <label class="field">
                <span class="label-text">Full Name</span>
                <?php profile_full_name_input($profile_errors); ?>
            </label>

            <label class="field">
                <span class="label-text">Phone Number</span>
                <?php profile_phone_input($profile_errors); ?>
            </label>

            <div class="field-row">
                <label class="field">
                    <span class="label-text">Gender</span>
                    <?php profile_gender_input($profile_errors); ?>
                </label>

                <label class="field">
                    <span class="label-text">Date of Birth</span>
                    <?php profile_dob_input($profile_errors); ?>
                </label>
            </div>

            <label class="field">
                <span class="label-text">Country</span>
                <?php profile_country_input($profile_errors); ?>
            </label>

            <label class="field">
                <span class="label-text">Bio</span>
                <?php profile_bio_input($profile_errors); ?>
            </label>

            <button type="submit" class="btn btn-primary">Done</button>
        </form>
    </main>
</body>
</html>