<html>
<head>
    <title>WOMENS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Form.css"> <!-- Link to your CSS file -->
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
    font-family: 'Arial', sans-serif;
    background-color: #393737;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
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

        /* Card Container */
        .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
    flex-grow: 1;
}

        /* Individual Card */
        .card {
            width: 280px;
            height: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card h3 {
            font-size: 18px;
            margin: 15px 0 5px;
            color: #333;
        }

        .card p {
            font-size: 16px;
            color: #777;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #4f83cc;
            color: #fff;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #3d6ea2;
        }
                 /* About Us Section */
                 .about-us {
            padding: 60px 20px;
            background-color: #03010cb3;
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
        <a href="admin.php" id="admin"><i class="fas fa-user-shield"></i>Admin</a>
        <a href="chart.php" id="cart"><i class="fas fa-shopping-cart"></i>Cart</a>
    </nav>

    <div class="card-container">
        <div class="card">
            <img src="https://blog.southindiajewels.com/wp-content/uploads/2022/04/Traditional-Big-Stud-Earrings-_-New-Latest-Designs-.jpg" alt="Product 1">
            <h3>Regular Wear Studs </h3>
            <p>Starting From 100/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://assets.ajio.com/medias/sys_master/root/20230515/ugTx/64621a1442f9e729d786683d/-473Wx593H-469131995-multi-MODEL.jpg" alt="Product 2">
            <h3>Peacock Zhumka</h3>
            <p>Starting From 250/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://down-ph.img.susercontent.com/file/cn-11134207-7r98o-ltrp50hvsmalf0" alt="Product 3">
            <h3>Bracelet Collection</h3>
            <p>Starting From 550/- Rs</p>
        <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://i.ytimg.com/vi/WKICsEUZ1hI/maxresdefault.jpg" alt="Product 4">
            <h3>Dimond Ring Collection</h3>
            <p>Starting From 250/- Rs</p>
         <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://www.gochikko.com/cdn/shop/files/GOKFBLUE1480-4_1800x1800.jpg?v=1687504663" alt="Product 1">
            <h3>Wedding Party Ethnics Dress </h3>
            <p>Starting From 600/- Rs </p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://www.hancockfashion.com/cdn/shop/files/14053Black_8.jpg?v=1734412115" alt="Product 2">
            <h3>Women Black Shirt Dress </h3>
            <p>Starting From 1500/- Rs </p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://images-na.ssl-images-amazon.com/images/I/61dOfc412nL.jpg" alt="Product 3">
            <h3> Boho Print Long Maxi Ball Gown</h3>
            <p>Starting From 1500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://surekacollection.com/wp-content/uploads/2024/07/Salwar-Kameez-308x462.png" alt="Product 4">
            <h3>Punjabi Dress collections</h3>
            <p>Staring From 700/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://www.carlington.in/cdn/shop/files/Carlington_elite_analog_ladies_watch_CT_2014_rosewhite.jpg?v=1696691393&width=2400" alt="Product 1">
            <h3>Premium Watch Collection</h3>
            <p>Starting From 1000/- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://m.media-amazon.com/images/I/71PPwLgADIL.jpg" alt="Product 2">
            <h3>Premium Perfum Collection </h3>
            <p>Starting From 500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://m.media-amazon.com/images/I/41AgT8f5DVL._AC_UY1100_.jpg" alt="Product 3">
            <h3>SunGlasses Collection</h3>
            <p>Starting From 1500/- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://media.licdn.com/dms/image/v2/D4D12AQHRs2b_capS1Q/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1720629748999?e=2147483647&v=beta&t=1TqeRyV-zaOLGoqI8QU9hJzKkNo9lv8bYGLPFrC6o7M" alt="Product 4">
            <h3>Premium Bags Collection</h3>
            <p>Startings From 1500/- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>        </div>
        <div class="card">
            <img src="https://hips.hearstapps.com/hmg-prod/images/elle-collage-torturous-heels-1676325155.jpg" alt="Product 1">
            <h3>Premium HighHeels Collection</h3>
            <p>Startings From 1500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://images.glowroad.com/faceview/j1g/fb/ei/cc/imgs/pd/1701082626927_28_62_29-xlgn400x400.jpg?productId=P-24416913" alt="Product 2">
            <h3>Sport Shoes Collections</h3>
            <p>Starting From 500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/t-shirt/v/7/y/xxs-7-graphic-t-shirts-combo-x-2-infirax-original-imagr3pruzgtyxgh.jpeg?q=90&crop=false" alt="Product 3">
            <h3>T Shirt Collection</h3>
            <p>Strating From 500/- Rs</p>
          <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://offduty.in/cdn/shop/files/image_ce133014-3059-446e-8b20-987100ac9f44_1080x.jpg?v=1706427404" alt="Product 4">
            <h3>Trouser Collection</h3>
            <p>Starting From 500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRka970j2gGXKqhkcayjFJOQy9_5YeDstzU8A&s" alt="Product 1">
            <h3>Premium Saree Collection</h3>
            <p>Staring From 1500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://img.paisawapas.com/ovz3vew9pw/2023/07/22112026/jeans-womens-pants.jpg" alt="Product 2">
            <h3> Jeans Collection </h3>
            <p>Starting From 450/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://img.freepik.com/premium-photo/collection-beautiful-white-hats-women-men-illustrated-digitally_717906-26577.jpg" alt="Product 3">
            <h3>Hats Collection</h3>
            <p>Starting From 500/- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://rukminim2.flixcart.com/image/850/1000/xif0q/scarf/u/e/q/free-size-psd123456-poshampaa-original-imagmfhvjfg8zkhe.jpeg?q=90&crop=false" alt="Product 4">
            <h3>Silk Scarf Collection</h3>
            <p>Starting From 500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
    </div>
    <div class="about-us">
        <h2>About Us</h2>
        <p>We are a premium online store offering high-quality fabrics, apparel, and accessories. Our mission is to provide stylish, comfortable, and durable products to our customers.</p>
        <button>Learn More</button>
    </div>
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

    <script src="form.js"></script>

</body>
</html>
