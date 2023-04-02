<?php
// Start a session to store user data
session_start();
// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit();
}
// Connect to the database
$servername = "localhost";
$username = "nikhil";
$password = "nikhil111";
$dbname = "dblab8";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Get user information from the database
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
// Check if any rows were returned
if ($result->num_rows > 0) {
  // Output user information
  $row = $result->fetch_assoc();
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  $email = $row["email"];
} else {
  echo "No data found";
}
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Information</title>
</head>
<body>
  <h2>User Information</h2>
  <p>First Name: <?php echo $first_name; ?></p>
  <p>Last Name: <?php echo $last_name; ?></p>
  <p>Email: <?php echo $email; ?></p>
</body>
</html>

