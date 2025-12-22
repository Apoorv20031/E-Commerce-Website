<?php
// Suppress warning and notice messages
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', 0);

// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayData($conn) {
    // List of allowed tables (tables you want to display)
    $allowedTables = ['electronic_table','men_table', 'women_table'];

    // Only fetch and display data from these tables
    foreach ($allowedTables as $tableName) {
        // Construct the SQL query to fetch data only from the allowed tables
        $dataQuery = "SELECT * FROM $tableName";
        $dataResult = $conn->query($dataQuery);

        if ($dataResult && $dataResult->num_rows > 0) {
            echo "<h3>Data from Table: $tableName</h3>";  // Table name as a heading
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th><th>Image</th><th>Actions</th></tr>";

            // Loop through and display the rows from the selected table
            while ($dataRow = $dataResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $dataRow['id'] . "</td>";
                echo "<td>" . $dataRow['name'] . "</td>";
                echo "<td>" . (isset($dataRow['price']) ? $dataRow['price'] : 'N/A') . "</td>";
                echo "<td>" . (isset($dataRow['description']) ? $dataRow['description'] : 'N/A') . "</td>";

                // Display image
                if (isset($dataRow['image_url']) && !empty($dataRow['image_url'])) {
                    echo "<td><img src='" . $dataRow['image_url'] . "' alt='Image' style='max-width:150px;max-height:150px;object-fit:cover;'></td>";
                } else {
                    echo "<td>No Image</td>";
                }

                // Edit and Delete buttons
                echo "<td>
                        <a href='?edit=" . $dataRow['id'] . "'>Edit</a> | 
                        <a href='?delete=" . $dataRow['id'] . "'>Delete</a>
                      </td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data found for table: $tableName</p>";
        }
    }
}


// Handling Update (Edit) Operation
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectQuery = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        // Get form data
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        // Handle image upload if exists
        if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
            $image = $_FILES['image_url']['name'];
            $imageExtension = pathinfo($image, PATHINFO_EXTENSION);
            $uniqueImageName = time() . rand(1000, 9999) . '.' . $imageExtension;
            $target = "uploads/" . $uniqueImageName;

            // Validate image type (optional)
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($_FILES['image_url']['type'], $allowedTypes)) {
                if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target)) {
                    // If a new image is uploaded, update the image URL
                    $image_url = $target;
                } else {
                    echo "Failed to upload image.";
                    exit;
                }
            } else {
                echo "Invalid file type. Only JPG, PNG, and GIF are allowed.";
                exit;
            }
        } else {
            // If no new image is uploaded, keep the old image URL
            $image_url = $row['image_url'];
        }

        // Update product information
        $updateQuery = "UPDATE products SET name = ?, price = ?, description = ?, image_url = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssdsi", $name, $price, $description, $image_url, $id);

        if ($stmt->execute()) {
            echo "Product updated successfully!";
            // Redirect to avoid resubmission on refresh
            header("Location: /path/to/your/page.php");
            exit;
        } else {
            echo "Error updating product: " . $stmt->error;
        }
    }
}

// Handling Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Product deleted successfully!";
        // Redirect to avoid resubmission on refresh
        header("Location: /path/to/your/page.php");
        exit;
    } else {
        echo "Error deleting product: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <style>

        /* Resetting some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* Hide scrollbars on the entire page */
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}
body::-webkit-scrollbar,
.main-content::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}


        /* Body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: ;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        th {
            background-color: #6c7ae0;
            color: #fff;
        }

        td {
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
        }

        /* Image Style in Table */
        img {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        /* Edit/Delete links */
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        /* Form Styling */
        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form h3 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Table Container */
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            overflow-x: auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }

            form {
                padding: 15px;
            }

            button[type="submit"] {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<h2>All Database Data</h2>

<!-- Update Product Form (only shown when edit link is clicked) -->
<?php
if (isset($_GET['edit'])) {
    echo "<h3>Edit Product</h3>";
    echo "<form action='' method='POST' enctype='multipart/form-data'>
            <label>Name: <input type='text' name='name' value='" . $row['name'] . "' required></label><br>
            <label>Price: <input type='text' name='price' value='" . (isset($row['price']) ? $row['price'] : '') . "' required></label><br>
            <label>Description: <textarea name='description' required>" . (isset($row['description']) ? $row['description'] : '') . "</textarea></label><br>
            <label>Image: <input type='file' name='image_url'></label><br>
            <button type='submit' name='update'>Update Product</button>
          </form>";
}
?>

<table>
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        <?php
        displayData($conn);
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
