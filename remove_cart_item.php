<?php
// Start session to access session variables
session_start();

// Check if the session variables are set
if (isset($_SESSION['user_id'])) {
    // Access the session data
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];
    $userEmail = $_SESSION['user_email'];
    $userMobile = $_SESSION['user_mobile'];
    $userAddress = $_SESSION['user_address'];

} else {
    // Redirect to login if the user is not logged in
    header("Location: homepage.php");
    exit;
}

// Handle logout request
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to homepage after logout
    echo "<script>window.location.href = 'homepage.php'; window.close();</script>";
    exit;
}
?>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "eshop");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected page (default to 'women')
$page = isset($_GET['page']) ? $_GET['page'] : 'products';

// Validate the selected page
$tableMapping = [
    "products" => "products_table",
    "men" => "men_table",
    "women" => "women_table",
    "electronic" => "electronic_table"
];

$tableName = $tableMapping[$page] ?? null;

if (!$tableName) {
    die("Invalid page selected.");
}

// Fetch products from the selected table, shuffled randomly
$sql = "SELECT * FROM $tableName ORDER BY RAND()";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadHaven</title>
    <link rel="stylesheet" href="Form.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
    
       /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Helvetica Neue', sans-serif;
    background-color: #393737;
    color: #333;
}

/* Header Styling */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 100;
    transition: box-shadow 0.3s ease;
}

header:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.logo h1 {
    font-size: 28px;
    font-weight: 600;
    color: #222;
    letter-spacing: 2px;
    text-transform: uppercase;
    transition: color 0.3s ease;
}

.logo h1:hover {
    color: #6a11cb;
}

/* Login Button Styling */
.login-btn button {
    background-color: #6a11cb;
    color: #fff;
    border: none;
    padding: 12px 30px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    border-radius: 50px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: 0.3s ease;
}

.login-btn button:hover {
    background-color: #2575fc;
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

/* Navigation Bar Styling */
nav {
    display: flex;
    justify-content: center;
    gap: 30px;
    background-color: black;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    padding: 12px 0;
}

nav a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    font-weight: 500;
    padding: 12px 25px;
    border-radius: 30px;
    transition: 0.3s ease;
}

nav a:hover {
    background-color: #6a11cb;
    color: #fff;
}

nav a i {
    margin-right: 8px;
}

nav a.active {
    background-color: #4CAF50;
    color: #fff;
    box-shadow: 0 0 10px rgba(37, 117, 252, 0.7);
    transform: translateY(-4px);
}

 /* Contact Form */
        main {
            padding: 50px 20px;
        }

        .contact-us {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .contact-us h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: #6a11cb;
        }

        .contact-form label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form button {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .contact-form button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }


/* About Us Section */
.about-us {
    padding: 60px 20px;
    background-color: #03010cb3;
    color: #fff;
    text-align: center;
}

.about-us h2 {
    font-size: 36px;
    margin-bottom: 20px;
    font-weight: 700;
}

.about-us p {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 20px;
    color: #ddd;
}

.about-us button {
    background: linear-gradient(135deg, #4f83cc, #1e2a3a);
    color: #fff;
    border: none;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 50px;
    cursor: pointer;
    transition: 0.3s ease;
}

.about-us button:hover {
    background: linear-gradient(135deg, #1e2a3a, #4f83cc);
}

/* Footer Styling */
footer {
    background-color: black;
    color: #fff;
    padding: 40px 20px;
    text-align: center;
}

.footer-top {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.footer-column {
    width: 23%;
    text-align: left;
}

.footer-column h3 {
    font-size: 22px;
    margin-bottom: 15px;
    font-weight: bold;
    color: #fff;
}

.footer-column ul {
    list-style: none;
    padding: 0;
}

.footer-column ul li {
    margin: 8px 0;
}

.footer-column ul li a {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
}

.footer-column ul li a:hover {
    color: #4f83cc;
}

.footer-column .social-icons {
    display: flex;
    gap: 10px;
}

.footer-column .social-icons a {
    color: #fff;
    font-size: 20px;
    transition: color 0.3s ease;
}

.footer-column .social-icons a:hover {
    color: #4f83cc;
}

.footer-bottom {
    border-top: 1px solid #fff;
    padding-top: 20px;
}

/* Call-to-Action Button */
.cta-button {
    background: linear-gradient(135deg, #4f83cc, #1e2a3a);
    color: #fff;
    padding: 15px 30px;
    font-size: 18px;
    border-radius: 50px;
    text-decoration: none;
    margin: 0 10px;
    transition: 0.3s ease;
}

.cta-button:hover {
    background: linear-gradient(135deg, #1e2a3a, #4f83cc);
    transform: translateY(-4px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-top {
        flex-direction: column;
        align-items: center;
    }

    .footer-column {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer-bottom {
        text-align: center;
    }

    .cta-button {
        margin: 10px 0;
    }
}


    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>ThreadHaven</h1>
        </div>

<div class ="info">
        <div class="welcome-message" style="font-family: serif, sans-serif; font-size: 18px; color: black; text-align: right; margin-top: 50px; margin-right: 10px;">
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_email'])) {
            // Display different messages for admin and regular user
            if ($_SESSION['user_role'] == 'Admin') {
                echo "<span class='admin-message'>Welcome back,Admin" . ($_SESSION['user_name'] ?? $_SESSION['user_email']) . "</span>";
            } else {
                echo "Welcome back, " . ($_SESSION['user_email'] ?? $_SESSION['user_name']);
            }
        } else {
            // If not logged in, show login link
            echo "<a href='homepage.php' style='color: white;'>Login</a>";
        }
        ?>

    </div>
<?php
// Start the session only if it's not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- User circle implemented as a span tag -->
<span class="user-circle" onclick="toggleUserCard()">
    <i class="fas fa-user"></i> <!-- Icon for the circle -->
</span>


  
</div>
    </header>
    <nav>
        <a href="display_products.php" id="home" ><i class="fas fa-home"></i>All Products</a>
        <a href="display_men.php" id="menswear"><i class="fas fa-tshirt"></i>Men's Wear</a>
        <a href="display_women.php" id="womenswear"><i class="fas fa-female"></i>Women's Wear</a>
        <a href="display_electronics.php" id="electronics"><i class="fas fa-plug"></i>Electronics</a>
        <a href="contact1.php" id="contact" class="active"><i class="fas fa-envelope"></i>Contact</a>
         <a href="#" id="cart"><i class="fas fa-shopping-cart"></i> Cart</a>
           <!-- Cart Button -->
  
        <a href="javascript:void(0);" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </a>
        
        
    </nav>
    <main>
        <!-- Cart Section (Initially Hidden) -->
<div id="cartSection" class="cart-container">
    <div class="cart-header">
        <h2>Your Cart</h2>
        <button id="closeCart">×</button>
    </div>
    <div id="cartItems" class="cart-items"></div>
   
    <button class="proceed-btn">Proceed to Pay</button>
</div>

        <!-- User info card -->
    <div class="user-info-card" id="user-info-card" style="display: none; font-family: Arial, sans-serif; margin: 20px; max-width: 400px; background-color: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, opacity 0.3s ease; text-align: left;">

    <!-- Close Button -->
        <button class="close-btn" onclick="closeUserCard()">✖</button>
    <h3 style="color: blueviolet;">User Information</h3>
    <?php if (isset($_SESSION['user_email'])): ?>
        <p><strong>Name:</strong> 
            <?php 
            if ($_SESSION['user_role'] == 'Admin') {
                echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : $_SESSION['user_email'];
            } else {
                echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : $_SESSION['user_email'];
            }
            ?>
        </p>

        <p><strong>Id:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
        <p><strong>Mobile:</strong> <?php echo htmlspecialchars($_SESSION['user_mobile']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($_SESSION['user_address']); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($_SESSION['user_role']); ?></p>
        <p><strong>Account Created:</strong> <?php echo htmlspecialchars($_SESSION['user_created_at']); ?></p>
    <?php else: ?>
        <p style="color: red;">No user information available. Please log in.</p>
    <?php endif; ?>
</div>
    <main>
        <section class="contact-us">
            <div class="container">
                <h1>Contact Us</h1>
                <p>We'd love to hear from you! Please use the form below to get in touch with us.</p>

                <div class="contact-details">
                    <h2>Our Contact Information</h2>
                    <p><strong>Address:</strong> 123 Textile Lane, Fabric City, TX 12345</p>
                    <p><strong>Phone:</strong> (123) 456-7890</p>
                    <p><strong>Email:</strong> support@threadhaven.com</p>
                </div>

               <div class="contact-form">
    <h2>Send Us a Message</h2>
    <form id="contactForm" action="submit_contact.php" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>

    <!-- Message displayed after form submission -->
    <div id="responseMessage"></div>
</div>

            </div>
        </section>
    </main>

    <div class="about-us">
        <h2>About Us</h2>
        <p>We are a premium online store offering high-quality fabrics, apparel, and accessories. Our mission is to provide stylish, comfortable, and durable products to our customers.</p>
        <button>Learn More</button>
    </div>
    
<!-- Footer Section -->
<footer>
    <div class="footer-top">
        <div class="footer-column">
            <h3>Featured Products</h3>
            <ul>
                <li><a href="#">Premium Cotton Shirts</a></li>
                <li><a href="#">Luxury Wool Scarves</a></li>
                <li><a href="#">Silk Ties Collection</a></li>
                <li><a href="#">Comfortable Jeans</a></li>
                <li><a href="#">Designer Jackets</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Special Offers</h3>
            <ul>
                <li><a href="#">Buy One, Get One Free</a></li>
                <li><a href="#">20% Off Your First Order</a></li>
                <li><a href="#">Exclusive Online Discounts</a></li>
                <li><a href="#">Free Shipping on Orders Over $50</a></li>
                <li><a href="#">Flash Sale - Limited Time Only</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Customer Support</h3>
            <ul>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Return Policy</a></li>
                <li><a href="#">Shipping Information</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Track Your Order</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2025 ThreadHaven. All Rights Reserved.</p>
        <div class="footer-cta">
            <a href="#" class="cta-button">Shop Now</a>
            <a href="#" class="cta-button">Join Our Newsletter</a>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get the current URL path
        const currentPath = window.location.pathname.split('/').pop();

        // Select all navigation links
        const navLinks = document.querySelectorAll('nav a');

        // Loop through each navigation link
        navLinks.forEach(link => {
            // Get the href attribute of the link
            const linkPath = link.getAttribute('href');

            // Check if the href matches the current path
            if (linkPath === currentPath) {
                // Add 'active' class to the matching link
                link.classList.add('active');
            } else {
                // Remove 'active' class from non-matching links
                link.classList.remove('active');
            }

            // Add click event listener for dynamic updates
            link.addEventListener('click', () => {
                // Remove 'active' class from all links
                navLinks.forEach(link => link.classList.remove('active'));

                // Add 'active' class to the clicked link
                link.classList.add('active');
            });
        });
    });
</script>

<script>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    const form = event.target;
    const formData = new FormData(form);

    // Send the form data to PHP using fetch
    fetch("submit_contact.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display success or error message
        const responseMessage = document.getElementById("responseMessage");
        responseMessage.textContent = data; // Show the response message from PHP

        // Clear the form after submission
        form.reset();
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById("responseMessage").textContent = "An error occurred. Please try again.";
    });
});
</script>


</body>
</html>