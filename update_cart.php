<?php
include 'db_connection.php'; // Ensure your database connection is included

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['product_id']) && isset($data['quantity'])) {
    $product_id = intval($data['product_id']);
    $quantity = intval($data['quantity']);

    $stmt = $conn->prepare("UPDATE cart SET product_quantity = ? WHERE product_id = ?");
    $stmt->bind_param("ii", $quantity, $product_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid data"]);
}
?>
