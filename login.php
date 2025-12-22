<?php
// Start session
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variable to store login message
$login_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input
    $email = $_POST['email'];
    $password = $_POST['password']; // Plaintext password

    // Prepare SQL query using prepared statements to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM login_user WHERE email = ?");
    $stmt->bind_param("s", $email); // "s" means the email is a string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Compare the plaintext password
        if ($password == $row['password']) {
            // Password is correct, start session
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = $row['role'];  // Store role in session

            // Store all user data in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_mobile'] = $row['mobile'];
            $_SESSION['user_address'] = $row['address'];
            $_SESSION['user_created_at'] = $row['created_at'];
            $_SESSION['user_remember_token'] = $row['remember_token'];

            // Check if the user is an admin
            if ($_SESSION['user_role'] == 'Admin') {
                // Redirect to admin page if admin
                header("Location: admin_dah.php");
                exit;
            } else {
                // Redirect to homepage for regular users
                header("Location: display_products.php");
                exit;
            }
        } else {
            $_SESSION['login_message'] = "Invalid email or password."; // Error message
            header("Location: Error_page.php"); // Redirect to error page
            exit;
        }
    } else {
        $_SESSION['login_message'] = "Invalid email or password."; // Error message
        header("Location: homepage.php"); // Redirect to error page
        exit;
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>
