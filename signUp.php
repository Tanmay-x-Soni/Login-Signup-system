<?php 
require_once 'Includes/config_sessions.inc.php';
require_once 'Includes/MVC_signUp/signup_view.inc.php';
$signup_errors = get_signup_errors();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Style/signUp.css">
</head>
<body>
     <main class="container">
        <form class="card" method="post" action="Includes/signUp.inc.php" novalidate >
                                    <!-- no validate means the browser will stop checking for input types  -->
            <h1 class="title">Create Account</h1>

            <label class="field">
                <span class="label-text">Username</span>
                <?php signup_username_input($signup_errors);  ?>
            </label>
            <label class="field">
                <span class="label-text">Email</span>
                <?php signup_email_input($signup_errors);  ?>
            </label>
            <label class="field">
                <span class="label-text">Password</span>
                <?php signup_password_input($signup_errors); ?>
            </label>
            <button type="submit" class="btn btn-primary">Sign Up</button>
             <h3> Already have an account ? <a href="logIn.php">Log In</a></h3>
        </form>
       
    </main>
</body>
</html>
<?php
unset($_SESSION['signup_data']);
unset($_SESSION['signup_errors']);
?>