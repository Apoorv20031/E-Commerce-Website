<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password']; // No hashing here
    $address = $_POST['Address'];

    // Default role for new users is 'user'
    $role = 'user'; 

    // Prepare and bind SQL query to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO login_user (name, email, mobile, password, address, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $mobile, $password, $address, $role);

    if ($stmt->execute()) {
        // Send success message to JavaScript to show in modal
        echo "<script>showMessage('Registration successful! You can now login.');</script>";
    } else {
        // Send error message to JavaScript to show in modal
        echo "<script>showMessage('Error: " . $stmt->error . "');</script>";
    }
}

$conn->close();
?>
