<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadHaven</title>
    <link rel="stylesheet" href="Form.css"> <!-- Link to your CSS file -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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

        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #4866a5;
            color: white;
            padding: 0;
            margin: 0;
        }

        /* Header Styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
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

        /* Main Content Styling */
       main {
            padding: 40px 20px;
            text-align: center;
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .collection-info {
            flex: 1;
            padding: 20px;
            color: #333;
        }

        .collection-info h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .collection-info p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #0a0a0a;
        }

        .collection-info button {
            background: linear-gradient(135deg, #4f83cc, #1e2a3a);
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .collection-info button:hover {
            background: linear-gradient(135deg, #1e2a3a, #4f83cc);
        }

        .collection-image {
            flex: 1;
            max-width: 45%;
            margin-left: 30px;
        }

        .collection-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

        .hero {
           
            background-image: url(https://gocolors.com/cdn/shop/files/Trending-banner-Web_1600x550.jpg?v=1732013261) ;



 

            color: black;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
    font-size: 4rem;
    margin-bottom: 20px;
    margin-right: 15%;
    color: black; /* White text color for visibility */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), -2px -2px 4px rgba(0, 0, 0, 0.3), 
                 4px 4px 6px rgba(0, 0, 0, 0.3), -4px -4px 6px rgba(0, 0, 0, 0.3);
    transform: perspective(500px) rotateX(5deg); /* Adds depth to the text */
}

.hero p {
    font-size: 24px;
    margin-bottom: 30px;
    color:black; /* White text color for visibility */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3), -1px -1px 2px rgba(0, 0, 0, 0.3);
    transform: perspective(500px) rotateX(5deg); /* Adds depth to the paragraph */
}

         .cta-button {
            background-color: #ff7f00;
            color: #fff;
            padding: 12px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 50px;
        }

        .cta-button:hover {
            background-color: #e06b00;
        }
        /* Promo Section */
        .promo-section {
            display: flex;
            justify-content: space-around;
            padding: 40px 20px;
            margin-top: 50px;
            background-color: black;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .promo-card {
            width: 30%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .promo-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .promo-card h4 {
            font-size: 22px;
            font-weight: 600;
            margin-top: 15px;
            color: #333;
        }

        .promo-card p {
            font-size: 16px;
            color: #4a009b;
        }
        .featured-products {
            padding: 40px 20px;
            text-align: center;
        }

        .featured-products h2 {
            font-size: 32px;
            margin-bottom: 30px;
        }

        .product-cards {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            background-color: black;
            padding: 40px 20px;
            margin-top: 50px;
        }

        .product-card {
            background-color: #0c1236;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 30%;
        }

        .product-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 18px;
            margin-bottom: 15px;
        }
          .add-to-cart {
            background-color: #4f83cc;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 50px;
        }

        .add-to-cart:hover {
            background-color: #3d6ea2;
        }
          /* About Us Section */
        .about-us {
            padding: 60px 20px;
            background-color:#03010cb3;
            color: #fff;
            text-align: center;
            margin-top: 80px;
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
            cursor: pointer;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .about-us button:hover {
            background: linear-gradient(135deg, #1e2a3a, #4f83cc);
        }
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


    </style>
</head>
<body>

    <header>
        <div class="logo">
            <h1>ThreadHaven</h1>
        </div>
        <div class="login-btn">
            <button class="btn"onclick="displayForm('login-form')">Login</button>
        </div>
    </header>

    <nav>
        <a href="homepage.php" id="home" class="active"><i class="fas fa-home"></i>Home</a>
        <a href="men.php" id="menswear"><i class="fas fa-tshirt"></i>Men's Wear</a>
        <a href="women.php" id="womenswear"><i class="fas fa-female"></i>Women's Wear</a>
        <a href="electronic.php" id="electronics"><i class="fas fa-plug"></i>Electronics</a>
        <a href="contact.php" id="contact"><i class="fas fa-envelope"></i>Contact</a>
        <a href="admin.php" id="admin"><i class="fas fa-user-shield"></i>Security</a>
        <a href="chart.php" id="cart"><i class="fas fa-shopping-cart"></i>Cart</a>
    </nav>
 <section class="hero">
            <h1>Welcome to ThreadHaven</h1>
            <p>Discover Premium Apparel and Accessories!</p>
            <a href="#" class="cta-button">Shop Now</a>

        </section>



    <main>
        
        
         <div class="collection-info">
            <h3>Welcome to ThreadHaven</h3>
            <p>Your one-stop destination for premium textiles. Explore our extensive collection of high-quality fabrics and stylish clothing!</p>
            <button>Shop Now</button>
        </div>
        <div class="collection-image">
            <img src="https://t3.ftcdn.net/jpg/06/36/44/26/360_F_636442646_II8z4yhYbPoea8P6HoimUblo6ZQXzUXY.jpg" alt="collection image">
        </div>
    </main>
     <section class="featured-products">
            <h2>Featured Products</h2>
           <div class="promo-section">
        <div class="promo-card">
            <img src="https://img.freepik.com/premium-vector/up-20-percent-off-special-discount-offer-upto-20-off-sale-advertising-campaign-vector-graphics_1206424-787.jpg" alt="promo image">
            <h4>Exclusive Offer</h4>
            <p>Get 20% off on your first purchase! Limited Time Offer</p>
        </div>
        <div class="promo-card">
            <img src="https://img.freepik.com/premium-psd/free-psd-new-collection-fashion-template-psd-social-media-post_534308-18090.jpg" alt="promo image">
            <h4>New Collection</h4>
            <p>Browse the latest collection of men's and women's wear.</p>
        </div>
        <div class="promo-card">
            <img src="https://img.freepik.com/premium-vector/black-friday-sale-big-discounts-electronics-fashion-more_1300528-85971.jpg" alt="promo image">
            <h4>Hot Deals</h4>
            <p>Don't miss out on these amazing discounts on electronics!</p>
        </div>
    </div>

            <div class="product-cards">
                <div class="product-card">
                    <img src="https://www.frankshop.in/cdn/shop/files/6-fotor-20240912221255.jpg?v=1729229900" alt="Product 1">
                    <h3>Premium Cotton Shirt</h3>
                    <p>Starts From ₹500 Only </p>
                    <a href="#" class="add-to-cart">Explore More</a>
                </div>
                <div class="product-card">
                    <img src="https://eloppe.in/cdn/shop/files/F-320.jpg?v=1705121909&width=713" alt="Product 2">
                    <h3>Luxury Wool Scarf</h3>
                    <p>Starts From ₹350 - ₹1000 Only</p>
                    <a href="#" class="add-to-cart">Explore More</a>
                </div>
                <div class="product-card">
                    <img src="https://i.pinimg.com/736x/63/78/62/6378622a27864c6dc2090c84565cf785.jpg" alt="Product 3">
                    <h3>Silk Tie Collection</h3>
                    <p>Starts From ₹500 Only</p>
                    <a href="#" class="add-to-cart">Explore More</a>
                </div>
            </div>
        </section>
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

<!-- Login form container -->
<div class="form-container" id="login-form">
    <span class="close-button" onclick="closeForm('login-form')">&times;</span>
    <h2>Login <i class="fas fa-sign-in-alt"></i></h2>
    <form action="login.php" method="post">
        <div class="input-container">
            <div class="floating-label-group">
                <input type="email" id="login-email" name="email" required>
                <label for="login-email">Email</label>
            </div>
        </div>
        <div class="input-container">
            <div class="floating-label-group">
                <input type="password" id="login-password" name="password" required>
                <label for="login-password">Password</label>
            </div>
        </div>
     
        <button type="submit">Login <i class="fas fa-sign-in-alt"></i></button>
        <p>
            Don't have an account?
            <a href="#" onclick="displayForm('register-form')">Register now</a>
        </p>
    </form>
</div>

<!-- Registration form container -->
<div class="form-container" id="register-form">
    <span class="close-button" onclick="closeForm('register-form')">&times;</span>
    <h2>Register <i class="fas fa-user-plus"></i></h2>
    <form action="register.php" method="post">
        <div class="input-container">
            <div class="floating-label-group">
                <input type="text" id="register-name" name="name" required>
                <label for="register-name">Name</label>
            </div>
        </div>
        <div class="input-container">
            <div class="floating-label-group">
                <input type="email" id="register-email" name="email" required>
                <label for="register-email">Email</label>
            </div>
        </div>
        <div class="input-container">
            <div class="floating-label-group">
                <input type="tel" id="register-mobile" name="mobile" required>
                <label for="register-mobile">Mobile No.</label>
            </div>
        </div>
        <div class="input-container">
            <div class="floating-label-group">
                <input type="password" id="register-password" name="password" required>
                <label for="register-password">Password</label>
            </div>
        </div>
        <div class="input-container">
            <div class="floating-label-group">
                <input type="text" id="register-address" name="Address" required>
                <label for="register-address">Address</label>
            </div>
        </div>
        <button type="submit">Register <i class="fas fa-user-plus"></i></button>
        <p>
            Already have an account?
            <a href="#" onclick="displayForm('login-form')">Login now</a>
        </p>
    </form>
</div>
    

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

       <script src="form.js"></script>

</body>
</html>