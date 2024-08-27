<?php
$fullName = $_POST['fullName'];
$donation = $_POST['donation'];
$number = $_POST['number'];
$address = $_POST['address'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'testdb3');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO user (fullName, donation, number, address) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("ssis", $fullName, $donation, $number, $address);
if (!$stmt->execute()) {
    die("Error in executing statement: " . $stmt->error);
}

echo "Thank you Donating ,Our team will receive your donation from our place";


// Close statement and connection
$stmt->close();
$conn->close();
?>
