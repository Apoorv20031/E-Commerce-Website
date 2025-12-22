<?php
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input to prevent SQL injection
    $productName = $conn->real_escape_string($_POST['productName']);
    $productPrice = $conn->real_escape_string($_POST['productPrice']);
    $productDiscount = $conn->real_escape_string($_POST['productDiscount']);
    $productDescription = $conn->real_escape_string($_POST['productDescription']);
    $productRatings = $conn->real_escape_string($_POST['productRatings']);
    $productAvailability = $conn->real_escape_string($_POST['productAvailability']);
    
    // Check if 'productPage' exists
    if (isset($_POST['productPage']) && !empty($_POST['productPage'])) {
        $selectedPage = $_POST['productPage'];

        // Map pages to respective tables and folders
        $tableMapping = [
            "products" => ["table" => "products_table", "folder" => "products"], // Updated folder name
            "men" => ["table" => "men_table", "folder" => "men"],
            "women" => ["table" => "women_table", "folder" => "women"],
            "electronic" => ["table" => "electronic_table", "folder" => "electronic"]
        ];

        // Validate the selected page
        $categoryData = $tableMapping[$selectedPage] ?? null;

        if (!$categoryData) {
            die("Invalid page selected.");
        }

        // Get the table name and category folder
        $tableName = $categoryData['table'];
        $categoryFolder = $categoryData['folder'];

        // Create the category folder if it doesn't exist
        $uploadDir = "uploads/" . $categoryFolder;
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Handle image upload with a unique name and category folder
        if (isset($_FILES['productImage']['name']) && !empty($_FILES['productImage']['name'])) {
            $image = $_FILES['productImage']['name'];
            $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueImageName = time() . rand(1000, 9999) . '.' . $imageExtension; // Generate unique file name
            $target = $uploadDir . "/" . $uniqueImageName;

            if (!move_uploaded_file($_FILES['productImage']['tmp_name'], $target)) {
                die("Failed to upload the image.");
            }
        } else {
            die("No image file uploaded.");
        }

        // Handle optional shoe sizes and cloth sizes
        $shoeSizes = isset($_POST['shoeSize']) ? implode(',', $_POST['shoeSize']) : null;
        $clothSizes = isset($_POST['clothSize']) ? implode(',', $_POST['clothSize']) : null;

        // Check for existing entries to avoid duplicates
        $checkSql = "SELECT * FROM $tableName WHERE name = '$productName' AND price = '$productPrice'";
        $result = $conn->query($checkSql);

        if ($result->num_rows > 0) {
            die("Product already exists in $tableName.");
        }

        // Insert product into the dynamically selected table
        $sql = "INSERT INTO $tableName (name, price, discount, description, ratings, availability, image_url, shoe_sizes, cloth_sizes) 
                VALUES ('$productName', '$productPrice', '$productDiscount', '$productDescription', '$productRatings', '$productAvailability', '$target', '$shoeSizes', '$clothSizes')";

        if ($conn->query($sql)) {
            echo "Product added successfully to $tableName!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        die("Page not selected. Please select a valid page.");
    }
}

$conn->close();
?>
