<?php
// Database configuration
$host = "localhost";
$username = "nikhil";
$password = "nikhil111";
$dbname = "dblab8";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Query the database to check if the user exists and has entered the correct password
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) > 0) {
		// User exists and password is correct, store user information in session and redirect to welcome page
		session_start();
		$user = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $user['email'];
		$_SESSION['first_name'] = $user['first_name'];
		$_SESSION['last_name'] = $user['last_name'];
		header("Location: welcome.php");
		exit();
	} else {
		// Invalid email or password, display error message
		echo "Invalid email address or password.";
	}
}

// Close the database connection
mysqli_close($conn);
?>

