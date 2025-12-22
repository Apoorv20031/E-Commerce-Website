<?php
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display "Out Of Stock" data
function displayOutOfStockData($conn) {
    $tableQuery = "SHOW TABLES";
    $tableResult = $conn->query($tableQuery);

    if ($tableResult->num_rows > 0) {
        while ($tableRow = $tableResult->fetch_assoc()) {
            $tableName = $tableRow['Tables_in_eshop'];

            // Check if the table has an 'availability' column before querying
            $columnQuery = "SHOW COLUMNS FROM $tableName";
            $columnResult = $conn->query($columnQuery);
            $hasAvailabilityColumn = false;

            while ($columnRow = $columnResult->fetch_assoc()) {
                if ($columnRow['Field'] == 'availability') {
                    $hasAvailabilityColumn = true;
                    break;
                }
            }

            // If the table has an 'availability' column, fetch the data where availability = 'Out Of Stock'
            if ($hasAvailabilityColumn) {
                // Debugging: Check if the table has data for 'Out Of Stock' availability
                $dataQuery = "SELECT * FROM $tableName WHERE availability = 'Out Of Stock'";
                $dataResult = $conn->query($dataQuery);

                // Debugging: Output the query result count
                echo "<h3>Table: $tableName</h3>";
                if ($dataResult->num_rows > 0) {
                    echo "<p>Found " . $dataResult->num_rows . " 'Out Of Stock' products in $tableName.</p>";

                    // Display the data in a table
                    echo "<table border='1' cellpadding='10' cellspacing='0'>
                            <thead>
                                <tr>
                                    <th>Table Name</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>";

                    while ($dataRow = $dataResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $tableName . "</td>";
                        echo "<td>" . $dataRow['id'] . "</td>";
                        echo "<td>" . $dataRow['name'] . "</td>";
                        echo "<td>" . $dataRow['price'] . "</td>";
                        echo "<td>" . $dataRow['description'] . "</td>";

                        // Display image
                        if (isset($dataRow['image_url']) && !empty($dataRow['image_url'])) {
                            echo "<td><img src='" . $dataRow['image_url'] . "' alt='Image' style='max-width:150px;max-height:150px;object-fit:cover;'></td>";
                        } else {
                            echo "<td>No Image</td>";
                        }

                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p>No 'Out Of Stock' products found in $tableName.</p>";
                }
            } else {
                echo "<p>No 'availability' column in table $tableName.</p>";
            }
        }
    } else {
        echo "<p>No tables found in the database.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Out Of Stock Products</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
body::-webkit-scrollbar,
.main-content::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}
        /* Body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
            line-height: 1.6;
        }

        h1, h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #6c7ae0;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            background-color: #fafafa;
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover td {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Image Styling */
        img {
            max-width: 120px;
            max-height: 120px;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.1);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            table {
                font-size: 12px;
            }

            img {
                max-width: 100px;
                max-height: 100px;
            }

            th, td {
                padding: 8px;
            }

            h1, h3 {
                font-size: 18px;
            }
        }

        /* Table Header Scrollbar (for large tables) */
        th {
            position: sticky;
            top: 0;
            z-index: 2;
        }

    </style>
</head>
<body>

<?php
// Call the function to display the "Out Of Stock" data
displayOutOfStockData($conn);
?>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
