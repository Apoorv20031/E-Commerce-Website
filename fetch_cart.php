<?php
// Start session to get user details
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $conn->real_escape_string($_SESSION['user_id']); // Prevent SQL injection

    // Check if the request is to remove an item
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove' && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // SQL to remove the product from the cart
        $sql_remove = "DELETE FROM pending_orders WHERE user_id = ? AND product_id = ? AND order_status = 'Pending'";
        $stmt = $conn->prepare($sql_remove);
        $stmt->bind_param("ii", $user_id, $product_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
        }

        $stmt->close();
    } else {
        // If it's not a remove request, fetch the cart items
        $sql_fetch = "SELECT product_id, product_name, product_price, product_discount, 
                             product_description, product_ratings, product_availability, 
                             product_image_url, product_shoe_sizes, product_cloth_sizes, 
                             product_quantity, order_status 
                      FROM pending_orders 
                      WHERE user_id = '$user_id' AND order_status = 'Pending'";

        $result = $conn->query($sql_fetch);

        $cart_items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cart_items[] = $row;
            }
            echo json_encode(['success' => true, 'cart' => $cart_items], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['success' => false, 'message' => 'No items in cart']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
}

// Close the database connection
$conn->close();
?>
