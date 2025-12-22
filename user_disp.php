<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'eshop'); // Replace with your actual credentials

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    // Ensure all fields are set and not empty
    if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['password'], $_POST['address'], $_POST['role'])) {
        $id = $_POST['id'];  // The user ID to be updated
        $new_name = $_POST['name'];
        $new_email = $_POST['email'];
        $new_mobile = $_POST['mobile'];
        $new_password = $_POST['password'];
        $new_address = $_POST['address'];
        $new_role = $_POST['role'];

        // SQL query to update the user's data directly
        $updateQuery = "UPDATE login_user SET name = ?, email = ?, mobile = ?, password = ?, address = ?, role = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssssi", $new_name, $new_email, $new_mobile, $new_password, $new_address, $new_role, $id);

        if ($stmt->execute()) {
            echo "User data updated successfully!";
        } else {
            echo "Error updating user: " . $stmt->error;
        }
    } else {
        echo "Error: Some fields are missing!";
    }
}

// Query to fetch all data from the login_user table
$sql = "SELECT id, name, email, mobile, password, address, role FROM login_user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Hide scrollbars on the entire page */
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}

       /* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
}

th {
    background-color: #6c7ae0;
    color: #ffffff;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

/* Input Fields */
input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: calc(100% - 12px);
    padding: 8px;
    margin: 4px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Buttons */
button,
input[type="button"],
input[type="submit"] {
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.update-btn {
    background-color: #4CAF50;
    color: white;
}

.edit-btn {
    background-color: #f9a825;
    color: white;
}

.cancel-btn {
    background-color: #f44336;
    color: white;
}

button:hover,
input[type="button"]:hover,
input[type="submit"]:hover {
    background-color: #333;
    color: #fff;
    transform: translateY(-2px);
}

/* Password Eye Icon */
.password-container {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.password-container input[type="password"] {
    width: 100%;
    padding-right: 35px;
}

.password-container .eye-icon {
    position: absolute;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    color: #777;
    transition: color 0.3s ease;
}

.password-container .eye-icon:hover {
    color: #333;
}

/* Editable Fields */
.editable input,
.editable select {
    background-color: #f0f8ff;
    color: #333;
}

.editable input:disabled,
.editable select:disabled {
    background-color: #f4f4f4;
    color: #999;
}

/* Responsive Design */
@media (max-width: 768px) {
    table {
        font-size: 12px;
    }

    th, td {
        padding: 8px;
    }

    button,
    input[type="button"],
    input[type="submit"] {
        padding: 6px 8px;
        font-size: 12px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        font-size: 12px;
    }
}

    </style>
</head>
<body>

<h2>User Data</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Password</th>
        <th>Address</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

<?php
// Display data with editable fields and update option
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST' action='" . $_SERVER['PHP_SELF'] . "'>";
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        
        // Editable fields (with a class to toggle editability)
        echo "<td class='editable'><input type='text' name='name' value='" . htmlspecialchars($row['name']) . "' disabled></td>";
        echo "<td class='editable'><input type='email' name='email' value='" . htmlspecialchars($row['email']) . "' disabled></td>";
        echo "<td class='editable'><input type='text' name='mobile' value='" . htmlspecialchars($row['mobile']) . "' disabled></td>";

        // Password field with Modern Show/Hide option using Font Awesome icons
        echo "<td class='editable'>
                <div class='password-container'>
                    <input type='password' name='password' id='password-".$row['id']."' value='" . htmlspecialchars($row['password']) . "' disabled>
                    <i class='fas fa-eye eye-icon' onclick='togglePassword(".$row['id'].")'></i>
                </div>
              </td>";

        echo "<td class='editable'><input type='text' name='address' value='" . htmlspecialchars($row['address']) . "' disabled></td>";
        
        // Role dropdown
        echo "<td class='editable'><select name='role' disabled>
                  <option value='User' " . ($row['role'] == 'User' ? 'selected' : '') . ">User</option>
                  <option value='Admin' " . ($row['role'] == 'Admin' ? 'selected' : '') . ">Admin</option>
              </select></td>";
        
        // Hidden input for the user ID
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        
        // Action buttons: Edit, Save and Cancel
        echo "<td>
                <input type='button' class='edit-btn' value='Edit' onclick='enableEdit(this)'>
                <input type='submit' name='update' value='Save' class='update-btn' style='display:none'>
                <button type='button' class='cancel-btn' onclick='cancelEdit(this)' style='display:none'>Cancel</button>
              </td>";
        echo "</tr>";
        echo "</form>";
    }
} else {
    echo "<tr><td colspan='8'>No users found</td></tr>";
}

$conn->close();
?>

</table>

<script>
    // Function to enable editing of the fields
    function enableEdit(button) {
        var row = button.closest('tr');
        var inputs = row.querySelectorAll('.editable input, .editable select');
        var saveBtn = row.querySelector('[name="update"]');
        var cancelBtn = row.querySelector('.cancel-btn');
        
        inputs.forEach(function(input) {
            input.disabled = false; // Enable input fields
        });
        saveBtn.style.display = 'inline-block'; // Show Save button
        cancelBtn.style.display = 'inline-block'; // Show Cancel button
        button.style.display = 'none'; // Hide Edit button
    }

    // Function to cancel editing and revert to original state
    function cancelEdit(button) {
        var row = button.closest('tr');
        var inputs = row.querySelectorAll('.editable input, .editable select');
        var editBtn = row.querySelector('.edit-btn');
        var saveBtn = row.querySelector('[name="update"]');
        var cancelBtn = row.querySelector('.cancel-btn');
        
        inputs.forEach(function(input) {
            input.disabled = true; // Disable input fields
        });
        saveBtn.style.display = 'none'; // Hide Save button
        cancelBtn.style.display = 'none'; // Hide Cancel button
        editBtn.style.display = 'inline-block'; // Show Edit button
    }

    // Function to toggle password visibility with Font Awesome icons
    function togglePassword(id) {
        var passwordField = document.getElementById('password-' + id);
        var icon = document.querySelector('#password-' + id + ' + .eye-icon');

        if (passwordField.type === "password") {
            passwordField.type = "text"; // Show password
            icon.classList.remove('fa-eye'); // Remove eye icon
            icon.classList.add('fa-eye-slash'); // Add eye-slash icon
        } else {
            passwordField.type = "password"; // Hide password
            icon.classList.remove('fa-eye-slash'); // Remove eye-slash icon
            icon.classList.add('fa-eye'); // Add eye icon
        }
    }
</script>

</body>
</html>
