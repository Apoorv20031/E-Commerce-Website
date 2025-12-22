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
$page = isset($_GET['page']) ? $_GET['page'] : 'electronic';

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
        /* Existing CSS styles for the page */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body::-webkit-scrollbar,
.main-content::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}
/* Header Styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: linear-gradient(135deg, #FF5722 50%, #3F51B5 50%);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position:static;
            top: 0;
            z-index: 100;
            transition: box-shadow 0.3s ease;
        }

        header:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        /* Logo Styling */
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
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-btn button:hover {
            background-color: #2575fc;
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .header-profile a {
  font-size: 50px;
  color: #333; /* Adjust color */
  text-decoration: none;
  margin: 0 10px;
}

.header-profile a:hover {
  color: #007bff; /* Hover color */
  transition: color 0.3s;
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
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav a:hover {
            background-color: #6a11cb;
            color: #fff;
        }

        nav a i {
            margin-right: 8px;
        }

        /* Active Button Glow Effect */
        nav a.active {
            background-color: #4CAF50;
            color: #fff;
            box-shadow: 0 0 10px rgba(37, 117, 252, 0.7);
            transform: translateY(-4px);
        }
        /* User Circle Icon */
.user-circle {
    position: absolute;
    top: 10px;
    right: 200px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(145deg, #6c757d, #495057);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.user-circle:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Info Card Container */
.user-info-card {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(to bottom, #ffffff, #f8f9fa);
    width: 360px;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    font-family: 'Arial', sans-serif;
    text-align: left;
    z-index: 1000;
    transition: opacity 0.3s ease, transform 0.3s ease;
    opacity: 1;
}

/* Close Button */
.user-info-card .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
    color: #6c757d;
    transition: color 0.3s ease, transform 0.2s ease;
}

.user-info-card .close-btn:hover {
    color: #e63946;
    transform: scale(1.2);
}

/* Info Card Title */
.user-info-card .info-title {
    font-size: 20px;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 20px;
    text-align: center;
    text-transform: capitalize;
}

/* User Info Details */
.user-info-card p {
    margin: 12px 0;
    font-size: 15px;
    line-height: 1.5;
    color: #495057;
}

/* Subtle Divider */
.user-info-card hr {
    border: none;
    border-top: 1px solid #e9ecef;
    margin: 15px 0;
}

/* Responsive Design */
@media (max-width: 400px) {
    .user-info-card {
        width: 90%;
        padding: 20px;
    }

    .user-circle {
        width: 50px;
        height: 50px;
        font-size: 18px;
    }

    .user-info-card .info-title {
        font-size: 18px;
    }

    .user-info-card p {
        font-size: 14px;
    }

    .user-info-card .close-btn {
        font-size: 18px;
    }
}
main {
    padding: 20px;
     }

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* At least 4 cards per row */
    gap: 20px; /* Space between cards */
    justify-items: center; /* Center cards in the grid */
}

.product-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 100%;
    height: 100%; /* Ensure it fills the available space */
    display: flex;
    flex-direction: column; /* Keep the card contents in a column layout */
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: scale(1.05); /* Slightly enlarge on hover */
}


/* Adjustments to product image */
.product-image {
    height: 200px;  /* You may adjust this to fit your design needs */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-bottom: 2px solid #e0e0e0;
    position: relative;
    background-color: #f8f8f8;
}

.product-image img {
    object-fit: contain;  /* Ensures image isn't cropped, fits within container */
    max-width: 100%;      /* Prevents the image from stretching */
    max-height: 100%;     /* Prevents image stretching */
    transition: transform 0.4s ease-in-out;
}


/* Hover Effect on Image */
.product-image:hover img {
    transform: scale(1.1);
}

.product-details {
    padding: 15px;
    flex-grow: 1; /* Allow content to grow within the card */
    display: flex;
    flex-direction: column; /* Stack content vertically */
    justify-content: space-between; /* Space out the content to maintain uniform height */
}

.product-name {
  font-size: 18px;
    font-weight: 500;
    color: black;
    margin-bottom: 10px;
    text-transform: capitalize;
}

.product-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
     line-height: 1.5;
}

.price-discount {
    font-size: 16px;
    margin-bottom: 10px;
}

.product-price {
   font-size: 16px;
    font-weight: bold;
    color: #0a342f;
    margin-bottom: 8px;
}


.product-discount {
     font-size: 14px;
    color: red;
    text-decoration:blink ;
    margin-left: 8px;
}
.ratings {
    margin-bottom: 10px;
      color: #f4a261;
}

.availability {
    font-size: 14px;
    color: #28a745;
   font-weight: 500;
    margin-bottom: 12px;
    text-transform: capitalize;
}

.size-options ul {
    padding-left: 0; /* Remove default padding */
    margin-bottom: 10px;
    display: flex; /* Display items in a row */
    flex-wrap: wrap; /* Allow wrapping if needed */
}

.size-options li {
    list-style-type: none; /* Remove default list bullet */
    margin-right: 10px; /* Space between items */
    font-size: 14px;
}

.add-to-cart {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    width: 100%;
    box-sizing: border-box;
    margin-top: auto; /* Push the button to the bottom of the card */
}

.add-to-cart:hover {
    background-color: #0056b3;
}
footer {
            background-color: #1e2a3a;
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
            list-style-type: none;
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

        footer p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .footer-cta {
            margin-top: 20px;
        }

        .cta-button {
            background: linear-gradient(135deg, #4f83cc, #1e2a3a);
            color: #fff;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 50px;
            text-decoration: none;
            margin: 0 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #1e2a3a, #4f83cc);
            transform: translateY(-4px);
        }

        @media (max-width: 768px) {
            .footer-top {
                flex-direction: column;
                align-items: center;
            }

            .footer-column {
                width: 100%;
                margin-bottom: 20px;
            }

            .footer-column h3 {
                text-align: center;
            }

            .footer-bottom {
                text-align: center;
            }

            .footer-cta {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .cta-button {
                margin: 10px 0;
            }
        }



    @media (max-width: 480px) {
        .product-card {
            width: 100%;
            margin: 0 auto;
        }
    }
     /* Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .logo h1 {
                font-size: 24px;
            }

            nav {
                flex-direction: column;
                align-items: center;
            }

            nav a {
                font-size: 16px;
                padding: 10px 20px;
            }

            main h2 {
                font-size: 28px;
            }

            main p {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            nav a {
                font-size: 14px;
                padding: 8px 16px;
            }

            main h2 {
                font-size: 24px;
            }

            main p {
                font-size: 16px;
            }
        }
        main{
            background-color: black;
        }
    /* Cart Container */
.cart-container {
    position: fixed;
    top: 10%;
    right: 0;
    width: 400px;
    height: auto;
    max-height: 80vh;
    background: white;
    border-left: 2px solid #ddd;
    box-shadow: -3px 3px 10px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    padding: 15px;
    transform: translateX(100%); /* Initially off-screen */
    transition: transform 0.3s ease-in-out;
    z-index: 9999; /* Ensure it appears in front of other content */
}

/* Show Cart */
.cart-container.show {
    transform: translateX(0); /* Slide in the cart when visible */
}

/* Cart Header */
.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

.cart-header h2 {
    margin: 0;
    font-size: 18px;
}

#closeCart {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}

/* Cart Items in Column Format */
.cart-items {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px 0;
}

/* Single Cart Item */
.cart-item {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f9f9f9;
    padding: 10px;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}

.cart-item:hover {
    background-color: #f0f0f0; /* Highlight on hover */
}

.cart-item img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.details {
    flex-grow: 1;
}

.details p {
    margin: 3px 0;
    font-size: 14px;
}

/* Proceed to Pay Button */
.proceed-btn {
    width: 100%;
    padding: 10px;
    background: #ff6600;
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
    transition: background 0.3s;
}

.proceed-btn:hover {
    background: #ff5500;
}

/* Remove Button Styling */
.remove-btn {
    background-color: #ff3b3b;
    color: white;
    border: none;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.remove-btn:hover {
    background-color: #ff2a2a;
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
        <a href="display_electronics.php" id="electronics"class="active"><i class="fas fa-plug"></i>Electronics</a>
        <a href="contact1.php" id="contact"><i class="fas fa-envelope"></i>Contact</a>
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
        <?php if ($result->num_rows > 0): ?>
        <div class="product-grid">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo !empty($row['image_url']) ? $row['image_url'] : 'default-placeholder.png'; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="product-details">
                        <h3 class="product-name"><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($row['description']); ?></p>
                        <div class="price-discount">
                            <span class="product-price">Price:₹<?php echo htmlspecialchars($row['price']); ?></span>
                            <?php if (!empty($row['discount'])): ?>
                                <span class='product-discount'>(<?php echo $row['discount']; ?>% off)</span>
                            <?php endif; ?>
                        </div>

                        <p class="ratings">
                            <?php
                            $rating = (int)$row['ratings'];
                            for ($i = 0; $i < 5; $i++) {
                                echo $i < $rating ? "&#9733;" : "&#9734;";
                            }
                            ?>
                            (<?php echo $rating; ?> / 5)
                        </p>
                        <p class="availability">Availability: <?php echo htmlspecialchars($row['availability']); ?></p>

                     <div class="size-options">
                    <?php if (!empty($row['shoe_sizes'])): ?>
                    <ul>Shoe Sizes:
                     <?php foreach (explode(',', $row['shoe_sizes']) as $size): ?>
                   <li><?php echo htmlspecialchars(trim($size)); ?></li>
                    <?php endforeach; ?>
                   </ul>
                   <?php endif; ?>

                   <?php if (!empty($row['cloth_sizes'])): ?>
                      <ul>Cloth Sizes:
                  <?php foreach (explode(',', $row['cloth_sizes']) as $size): ?>
                <li><?php echo htmlspecialchars(trim($size)); ?></li>
              <?php endforeach; ?>
                 </ul>
           <?php endif; ?>
            </div>

<button class="add-to-cart" onclick="addToCart(
    <?php echo $row['id']; ?>, 
    '<?php echo addslashes(htmlspecialchars($row['name'])); ?>', 
    <?php echo $row['price']; ?>, 
    '<?php echo addslashes(htmlspecialchars($row['discount'])); ?>', 
    '<?php echo addslashes(htmlspecialchars($row['shoe_sizes'])); ?>', 
    '<?php echo addslashes(htmlspecialchars($row['cloth_sizes'])); ?>', 
    '<?php echo addslashes(htmlspecialchars($row['description'])); ?>', 
    '<?php echo addslashes(htmlspecialchars($row['image_url'])); ?>'
)">
    Add to Cart
</button>
</button>

                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </main>
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

</body>
  <script>
        function logout() {
            // Send a request to the same page to logout
            window.location.href = window.location.href + "?logout=true";
        }
      
// Toggle the visibility of the user info card
function toggleUserCard() {
    var userCard = document.getElementById('user-info-card');
    userCard.style.display = (userCard.style.display === 'block') ? 'none' : 'block';
}

// Close the user info card
function closeUserCard() {
    document.getElementById('user-info-card').style.display = 'none';
}

function addToCart(productId, productName, productPrice, productDiscount, productShoeSizes, productClothSizes, productDescription, productImageUrl) {
    // Prepare data to send to PHP script
    var cartData = {
        product_id: productId,
        product_name: productName,
        product_price: productPrice,
        product_discount: productDiscount,
        product_description: productDescription,
        product_ratings: 5,  // Static rating for now, can be adjusted
        product_availability: 'In Stock',  // Modify based on actual availability
        product_image_url: productImageUrl,
        product_shoe_sizes: productShoeSizes,
        product_cloth_sizes: productClothSizes,
        product_quantity: 1,  // You can dynamically set this
        order_status: 'pending'  // Order status is set to pending initially
    };

    // Log the data to the console for debugging
    console.log(cartData);

    // Send data to PHP backend using fetch
    fetch('add_to_cart.php', {
        method: 'POST',  // Send data as POST request
        headers: {
            'Content-Type': 'application/json'  // Tell PHP that we're sending JSON
        },
        body: JSON.stringify(cartData)  // Send the cartData object as a JSON string
    })
    .then(response => response.json())  // Parse the JSON response from PHP
    .then(data => {
        if (data.success) {
            alert('Product added to cart');
        } else {
            alert('Failed to add product to cart: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);  // Log any errors to the console
        alert('An error occurred');
    });
}

</script>
/* script for show cart section*/
  <script>
      document.getElementById("cart").addEventListener("click", function (event) {
    event.preventDefault();
    fetchCartData();
});


// Function to fetch cart data
function fetchCartData() {
    fetch("fetch_cart.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let cartHTML = "";
                let totalPrice = 0; // Initialize total price to 0

                data.cart.forEach(item => {
                    let sizeHTML = "";
                    let finalPrice = item.product_price - (item.product_price * (item.product_discount / 100)); // Final price after discount

                    totalPrice += finalPrice * item.product_quantity; // Add the final price for this item to the total

                    // Check if cloth sizes are available and create radio buttons
                    if (item.product_cloth_sizes) {
                        sizeHTML += `
                            <p>Select Cloth Size:</p>
                            <div class="size-options">
                                ${item.product_cloth_sizes.split(',').map(size => `
                                    <label>
                                        <input type="radio" name="size_${item.product_id}" value="${size}">
                                        ${size}
                                    </label>
                                `).join('')}
                            </div>
                        `;
                    }
                    
                    // Check if shoe sizes are available and create radio buttons
                    if (item.product_shoe_sizes) {
                        sizeHTML += `
                            <p>Select Shoe Size:</p>
                            <div class="size-options">
                                ${item.product_shoe_sizes.split(',').map(size => `
                                    <label>
                                        <input type="radio" name="size_${item.product_id}" value="${size}">
                                        ${size}
                                    </label>
                                `).join('')}
                            </div>
                        `;
                    }

                    cartHTML += `
                        <div class="cart-item" data-product-id="${item.product_id}">
                            <img src="${item.product_image_url || 'placeholder.jpg'}" alt="${item.product_name}">
                            <div class="details">
                                <p><strong>${item.product_name || "N/A"}</strong></p>
                                <p>Price: ₹${item.product_price || "0.00"}</p>
                                <p>Discount: ${item.product_discount || "0"}%</p>
                                <p>Final Price: ₹${finalPrice.toFixed(2)}</p>
                                
                                <!-- Quantity update section -->
                                <p>Quantity: 
                                    <input type="number" value="${item.product_quantity}" min="1" class="quantity-input" data-product-id="${item.product_id}">
                                </p>
                                
                                ${sizeHTML} <!-- Display size options dynamically -->
                            </div>
                            <button class="remove-btn" onclick="removeFromCart(${item.product_id})">Remove</button>
                        </div>
                    `;
                });

                // Display the total price
                cartHTML += `
                    <div class="total-price">
                        <p><strong>Total Price: ₹${totalPrice.toFixed(2)}</strong></p>
                    </div>
                `;

                document.getElementById("cartItems").innerHTML = cartHTML;
                document.getElementById("cartSection").classList.add("show");

                // Add event listeners for quantity changes
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', updateQuantity);
                });

            } else {
                document.getElementById("cartItems").innerHTML = "<p>No items in cart</p>";
                document.getElementById("cartSection").classList.add("show");
            }
        })
        .catch(error => {
            console.error("Error fetching cart data:", error);
            document.getElementById("cartItems").innerHTML = "<p>Error loading cart items</p>";
        });
}

// Update quantity in the cart
function updateQuantity(event) {
    const productId = event.target.dataset.productId;
    const newQuantity = parseInt(event.target.value);

    if (newQuantity < 1) return; // Ensure the quantity is at least 1

    // Send the updated quantity to the server
    fetch("update_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `product_id=${productId}&quantity=${newQuantity}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchCartData(); // Re-fetch the cart data after updating
        } else {
            alert("Failed to update quantity.");
        }
    })
    .catch(error => {
        console.error("Error updating quantity:", error);
        alert("Error updating quantity.");
    });
}

// Function to remove an item from the cart
function removeFromCart(productId) {
    fetch("update_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `product_id=${productId}&action=remove`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchCartData(); // Re-fetch the cart data after removal
        } else {
            alert("Failed to remove item.");
        }
    })
    .catch(error => {
        console.error("Error removing item:", error);
        alert("Error removing item.");
    });
}

// Close Cart Functionality
document.getElementById("closeCart").addEventListener("click", function () {
    document.getElementById("cartSection").classList.remove("show");
});

document.getElementById("cart").addEventListener("click", function () {
    fetchCartData();  // Ensure cart data is fetched when user clicks on cart
});

    </script>

</body>
</html>
