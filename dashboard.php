<?php
session_start();

// User must login first
if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

// Assuming you stored these during login
$username = $_SESSION['username'];
$email = $_SESSION['email'];      // if available
$userid = $_SESSION['id'];        // optional
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

</div>


<div class="profile-card">

<div class="profile-image">

<img <?php if ($_SESSION["username"]== "Tanmay1"){
    echo'src="images/tanmayAvatar.png"';
}
else {echo'src="images/avatar.png"';}
?>
>

</div>

<h1>
<?php echo htmlspecialchars($username); ?>
</h1>

<p class="subtitle">
Welcome Back 👋
</p>

<div class="info">

<div class="box">

<h3>Username</h3>

<p>

<?php echo htmlspecialchars($username); ?>

</p>

</div>


<div class="box">

<h3>Email</h3>

<p>

<?php echo htmlspecialchars($email); ?>

</p>

</div>


<div class="box">

<h3>User ID</h3>

<p>

<?php
if(isset($userid))
echo $userid;
else
echo "Not Available";
?>

</p>

</div>


<div class="box">

<h3>Status</h3>

<p class="active">

Active User

</p>

</div>

</div>

</div>

</div>

</body>
</html>