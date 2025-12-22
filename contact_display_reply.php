<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eshop"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Reply form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply_message'])) {
    $reply_message = trim($_POST['reply_message']);
    $contact_id = intval($_POST['contact_id']); // Ensure contact_id is an integer

    if (!empty($reply_message)) {
        // Update reply message in the database
        $stmt = $conn->prepare("UPDATE contact_submissions SET reply_message = ? WHERE id = ?");
        $stmt->bind_param("si", $reply_message, $contact_id);

        if ($stmt->execute()) {
            $success_message = "Reply sent successfully!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error_message = "Reply message cannot be empty!";
    }
}

// Fetch contact submissions
$sql = "SELECT * FROM contact_submissions ORDER BY id DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submissions and Reply</title>
    <style>
        /* Hide scrollbars on the entire page */
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}

        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #6c7ae0;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        button, a {
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, a:hover {
            background-color: #45a049;
        }
        .reply-form {
            display: none;
            margin-top: 20px;
            background-color: #fafafa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .reply-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .message-box {
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert.success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <script>
        function toggleReplyForm(id) {
            const form = document.getElementById('reply-form-' + id);
            form.style.display = form.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Contact Submissions</h2>

    <!-- Display success or error message -->
    <?php if (!empty($success_message)): ?>
        <div class="alert success"><?php echo $success_message; ?></div>
    <?php elseif (!empty($error_message)): ?>
        <div class="alert error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <!-- Contact submissions table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Received At</th>
            <th>Reply</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars(substr($row['message'], 0, 100)); ?>...</td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><button onclick="toggleReplyForm(<?php echo $row['id']; ?>)">Reply</button></td>
                </tr>
                <!-- Reply Form -->
                <tr id="reply-form-<?php echo $row['id']; ?>" class="reply-form">
                    <td colspan="6">
                        <form method="POST">
                            <input type="hidden" name="contact_id" value="<?php echo $row['id']; ?>">
                            <div class="message-box">
                                <strong>Message:</strong>
                                <p><?php echo htmlspecialchars($row['message']); ?></p>
                            </div>
                            <textarea name="reply_message" rows="4" placeholder="Type your reply here..." required></textarea>
                            <button type="submit">Send Reply</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No submissions found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>
