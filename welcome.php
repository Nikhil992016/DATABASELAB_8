<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
</head>
<body>
  <span style="font-size: 24px;"><h2>Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>!</h2></span>
  <p><a href="information.php?PHPSESSID=<?php echo session_id(); ?>">View your information</a></p>
  <p><a href="update.html">Update your information</a></p>
  <p><a href="logout.php">Logout</a></p>
  <p><form method="post" action="delete.php">
    <input type="hidden" name="PHPSESSID" value="<?php echo session_id(); ?>">
    <input type="submit" value="Delete your account">
  </form></p>
  
</body>
</html>

