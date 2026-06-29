<?php
// session_start();

if (!isset($_SESSION['user'])) {
    header("Location: logIn.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
</head>
<body>
    <h1>Login Successful</h1>
    <p>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</p>
    <p>Your email: <?php echo htmlspecialchars($user['email']); ?></p>
</body>
</html>