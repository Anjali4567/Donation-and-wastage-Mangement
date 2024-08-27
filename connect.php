<?php

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];


$conn = new mysqli('localhost', 'root', '', 'data');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO pay1 (name, email, amount, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssdsss", $name, $email, $amount, $card_number, $expiry_date, $cvv);

// Execute SQL statement
if ($stmt->execute()) {
    // Payment successfully inserted
    echo "<h2>Payment Successful!</h2>";
    echo "<p>Thank you, $name, for your payment of $$amount.</p>";
} else {
    // Error inserting payment
    echo "<h2>Error Processing Payment</h2>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
