<?php
// Database connection details
$servername = "localhost";
$username = "db_user";
$password = "root_password";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$dob = $conn->real_escape_string($_POST['dob']);
$gender = $conn->real_escape_string($_POST['gender']);
$address = $conn->real_escape_string($_POST['address']);

// Attempt insert query execution
$sql = "INSERT INTO students (name, email, phone, dob, gender, address) VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$address')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
