<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["email"])) {
  header("Location: login.php");
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

// Check if the form has been submitted
if (isset($_POST["submit"])) {
  // Get the updated user information
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Update the user in the database
  $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', password='$password' WHERE email='$email'";
  if ($conn->query($sql) === TRUE) {
    // Store the updated user information in the session
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    // Print a success message
    echo "User updated successfully. <a href='welcome.php'>Back to Welcome page</a>";

  } else {
    echo "Error updating user: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

