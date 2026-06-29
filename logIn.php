<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="Style/logIn.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <form method="post" action="Includes/logIn.inc.php">
                <h1 class="title">
                    Log In
                </h1>
                <label  class="field">
                    <span class="label-text">
                        Username
                    </span>
                    <input type="text" name="username" placeholder="Enter Username">
                </label>
                <label  class="field">
                    <span class="label-text">
                        Password
                    </span>
                    <input type="password" name="password" placeholder="Enter Password">
                </label>
                <button type="submit" class="btn btn-primary">Log In</button>
                <h3> Don't have an account ? <a href="signUp.php">Sign Up</a></h3>
            </form>
        </div>
    </div>
</body>
</html>