<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// Database connection
$conn = new mysqli('localhost', 'root', '', 'login');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO user (username,email,password ) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("sss", $username, $email, $password);
if (!$stmt->execute()) {
    die("Error in executing statement: " . $stmt->error);
}

echo "Login successfully...";

// Close statement and connection
$stmt->close();
$conn->close();
?>
