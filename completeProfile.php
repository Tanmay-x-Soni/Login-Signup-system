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
    <link rel="stylesheet" href="Style/profileSetup.css?v=3">
</head>
<body>
    <main class="profile-setup">
        <div class="star-field" aria-hidden="true"></div>
        <div class="nebula nebula-one" aria-hidden="true"></div>
        <div class="nebula nebula-two" aria-hidden="true"></div>

        <section class="setup-shell">
            <aside class="setup-intro">
                <a href="dashboard.php" class="brand" aria-label="Back to dashboard"><span>N</span> NEBULA</a>
                <div class="intro-copy">
                    <p class="eyebrow">Identity configuration</p>
                    <h1>Build your<br><em>digital presence.</em></h1>
                    <p>Complete your profile to personalize your Nebula space and unlock your full dashboard.</p>
                </div>
                <div class="progress-list" aria-label="Profile setup progress">
                    <div class="progress-item active"><span>01</span><div><strong>Basic identity</strong><small>Tell us who you are</small></div></div>
                    <div class="progress-item"><span>02</span><div><strong>Personal details</strong><small>Connect your profile</small></div></div>
                    <div class="progress-item"><span>03</span><div><strong>Profile ready</strong><small>Enter your dashboard</small></div></div>
                </div>
            </aside>

            <form class="card" method="post" action="Includes/completeProfile.inc.php" novalidate>
                <header class="form-header">
                    <p class="eyebrow">Profile setup <span>•</span> step 1 of 1</p>
                    <h2>Complete your profile</h2>
                    <p>Everything marked optional can be added later.</p>
                </header>

                <div class="form-divider"><span>Personal signal</span></div>

                <label class="field"><span class="label-text"><i>✦</i> Full name</span><?php profile_full_name_input($profile_errors); ?></label>
                <label class="field"><span class="label-text"><i>⌁</i> Phone number <small>optional</small></span><?php profile_phone_input($profile_errors); ?></label>

                <div class="field-row">
                    <label class="field"><span class="label-text"><i>◇</i> Gender</span><?php profile_gender_input($profile_errors); ?></label>
                    <label class="field"><span class="label-text"><i>◷</i> Date of birth</span><?php profile_dob_input($profile_errors); ?></label>
                </div>

                <label class="field"><span class="label-text"><i>⌖</i> Country</span><?php profile_country_input($profile_errors); ?></label>
                <label class="field"><span class="label-text"><i>✧</i> Bio <small>optional</small></span><?php profile_bio_input($profile_errors); ?></label>

                <button type="submit" class="btn btn-primary"><span>Activate profile</span><b>→</b></button>
                <p class="privacy-note"><span>◈</span> Your information stays connected to your account only.</p>
            </form>
        </section>
    </main>
</body>
</html>
