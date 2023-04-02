<?php
//connect to MySQL database
$servername = "localhost";
$username = "nikhil";
$password = "nikhil111";
$dbname = "dblab8";
$conn = new mysqli($servername, $username, $password, $dbname);
//check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//get user input data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

//validate user input data
if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($confirm_password)) {
    echo "All fields are required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
} elseif (strlen($password) < 8) {
    echo "Password must be at least 8 characters long.";
} elseif ($password !== $confirm_password) {
    echo "Password and Confirm Password fields must match.";
} else {


    //insert user data into MySQL database
$sql = "INSERT INTO users (first_name, last_name, email, password) 
VALUES ('$fname', '$lname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registration successful.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

