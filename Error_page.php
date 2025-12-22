<?php
// Start session
session_start();

// Retrieve the login message from session
$login_message = isset($_SESSION['login_message']) ? $_SESSION['login_message'] : '';

// Clear the session message after displaying
unset($_SESSION['login_message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Card container styling */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 20px;
            text-align: center;
            box-sizing: border-box;
        }

        /* Error message styling */
        .error-message {
            color: #ff4d4d;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Button style */
        .button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Error</h2>

    <?php if (!empty($login_message)): ?>
        <p class="error-message"><?php echo $login_message; ?></p>
    <?php endif; ?>

    <a href="homepage.php" class="button">Go back to Login</a>
</div>

</body>
</html>
