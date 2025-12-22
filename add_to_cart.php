<?php
// Start session to access session data
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the session has the necessary user details
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? '';
$user_email = $_SESSION['user_email'] ?? '';
$user_mobile = $_SESSION['user_mobile'] ?? '';
$user_address = $_SESSION['user_address'] ?? '';

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the request
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate & Escape Data
    $product_id = $conn->real_escape_string($data['product_id'] ?? '');
    $product_name = $conn->real_escape_string($data['product_name'] ?? '');
    $product_price = $conn->real_escape_string($data['product_price'] ?? '');
    $product_discount = $conn->real_escape_string($data['product_discount'] ?? '');
    $product_description = $conn->real_escape_string($data['product_description'] ?? '');
    $product_ratings = $conn->real_escape_string($data['product_ratings'] ?? '');
    $product_availability = $conn->real_escape_string($data['product_availability'] ?? '');
    $product_image_url = $conn->real_escape_string($data['product_image_url'] ?? '');
    $product_shoe_sizes = $conn->real_escape_string($data['product_shoe_sizes'] ?? '');
    $product_cloth_sizes = $conn->real_escape_string($data['product_cloth_sizes'] ?? '');
    $product_quantity = $conn->real_escape_string($data['product_quantity'] ?? '1');
    $order_status = $conn->real_escape_string($data['order_status'] ?? 'Pending');

    // Check if essential values are missing
    if (empty($product_id) || empty($product_name) || empty($product_price)) {
        echo json_encode(['success' => false, 'error' => 'Missing essential product details']);
        exit;
    }

    // Insert data into pending_orders table
    $sql = "INSERT INTO pending_orders 
            (user_id, user_name, user_email, user_mobile, user_address, 
             product_id, product_name, product_price, product_discount, 
             product_description, product_ratings, product_availability, 
             product_image_url, product_shoe_sizes, product_cloth_sizes, 
             product_quantity, order_status, created_at) 
            VALUES 
            ('$user_id', '$user_name', '$user_email', '$user_mobile', '$user_address', 
             '$product_id', '$product_name', '$product_price', '$product_discount', 
             '$product_description', '$product_ratings', '$product_availability', 
             '$product_image_url', '$product_shoe_sizes', '$product_cloth_sizes', 
             '$product_quantity', '$order_status', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $conn->close();
}
?>
