<?php
// Start session to get user details
session_start();
$conn = new mysqli("localhost", "root", "", "eshop");

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Decode the incoming JSON data
$data = json_decode(file_get_contents("php://input"));

// Fetch user details from the session
$sql_user = "SELECT name, email, mobile, address FROM login_user WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$user_result = $stmt_user->get_result();
$user = $user_result->fetch_assoc();

// Gather data from the request
$user_name = $user['name'];
$user_email = $user['email'];
$user_mobile = $data->user_mobile;
$user_address = $data->user_address;
$payment_method = $data->payment_method;
$coupon_code = $data->coupon_code;
$total_value = $data->total_value;
$created_at = date('Y-m-d H:i:s');
$order_id = $data->order_id;
$cart_items = $data->cart_items; // Array of cart items (product details)

// Insert order details into the orders table
foreach ($cart_items as $item) {
    $sql_insert = "INSERT INTO orders 
                    (user_id, user_name, user_email, user_mobile, user_address, 
                     product_id, product_name, product_price, product_discount, 
                     product_description, product_ratings, product_availability, 
                     product_image_url, product_shoe_sizes, product_cloth_sizes, 
                     product_quantity, payment_option, total_value, coupon_code, 
                     created_at, order_id) 
                    VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("isssssssssssiiiiissss", 
                            $user_id, $user_name, $user_email, $user_mobile, $user_address, 
                            $item['product_id'], $item['product_name'], $item['product_price'], 
                            $item['product_discount'], $item['product_description'], $item['product_ratings'], 
                            $item['product_availability'], $item['product_image_url'], 
                            $item['product_shoe_sizes'], $item['product_cloth_sizes'], 
                            $item['product_quantity'], $payment_method, $total_value, $coupon_code, 
                            $created_at, $order_id);

    $stmt_insert->execute();
}

// Optionally, you can delete the items from the `pending_orders` table if order is successful
$sql_delete_cart = "DELETE FROM pending_orders WHERE user_id = ? AND order_status = 'Pending'";
$stmt_delete_cart = $conn->prepare($sql_delete_cart);
$stmt_delete_cart->bind_param("i", $user_id);
$stmt_delete_cart->execute();

// Close statements and connections
$stmt_user->close();
$stmt_insert->close();
$stmt_delete_cart->close();
$conn->close();

echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
?>
