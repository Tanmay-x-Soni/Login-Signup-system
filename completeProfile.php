<?php 
// require_once 'Includes/config_sessions.inc.php';
// require_once 'Includes/MVC_signUp/signup_view.inc.php';
// $signup_errors = get_signup_errors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete profile</title>
    <link rel="stylesheet" href="Style/profileSetup.css">
</head>
<body>
     <main class="container">
        <form class="card" method="post"  novalidate >
                                    <!-- no validate means the browser will stop checking for input types  -->
            <h1 class="title">Complete Profile</h1>
            
            <label class="field">
                <span class="label-text">Full Name</span>
                <input type="text" name="full_name" placeholder="Your Full name">
                <?php //signup_full_name_input($signup_errors);  ?>
            </label>


            <label class="field">
                <span class="label-text">Phone Number</span>
                <?php //signup_phone_number_input($signup_errors);  ?>
                <input type="tel" name="phone_number" placeholder="Enter your phone number" maxlength="10" pattern="[0-9]{10}">
            </label>
            <label class="field">
                <span class="label-text">Gender</span>
                <?php //signup_gender_input($signup_errors);  ?>
                <select name="gender" >
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </label>
            <label class="field">
                <span class="label-text">Date of Birth</span>
                <?php //signup_date_of_birth_input($signup_errors);  ?>
                <input type="date" name="date_of_birth" placeholder="YYYY-MM-DD">
            </label>
            <label class="field">
                <span class="label-text">Country</span>
                <?php //signup_country_input($signup_errors);  ?>
                <select name="country">
                    <option value="">Select country</option>
                    <option value="india">India</option>
                    <option value="usa">USA</option>
                    <option value="china">China</option>
                    <option value="japan">Japan</option>
                    <option value="other">Other</option>
                </select>
            </label>
            <button type="submit" class="btn btn-primary">Done</button>
        </form>
       
    </main>
</body>
</html>
<?php
// unset($_SESSION['signup_data']);
// unset($_SESSION['signup_errors']);
?>