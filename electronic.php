<html>
<head>
    <title>ELECTRONICS</title>
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


        /* Card Container */
        .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
    flex-grow: 1;
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
            <img src="https://leccygenesis.com/cdn/shop/files/1st-img_33b5aaaa-ba0e-4bf5-b2f2-32fea83815be_1000X1000.jpg?v=1724326675">
            <h3>electric board</h3>
            <p> Starting From Rs200.00</p>
            <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://www.premierkitchen.in/wp-content/uploads/2023/01/Premier-Carina-Mixer-Grinder-MG5133-230V-50-Hz.jpg">
            <h3>juice mixer</h3>
            <p>Starting From Rs500.00</p>
            <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://media.croma.com/image/upload/v1672401068/Croma%20Assets/CMS/Vidhi/17-08-2022/infographic-what-is-dishwasher_jrxp2j.jpg">
            <h3>dishwasher</h3>
            <p> Starting From Rs2000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBVLC_Xi4xaK07FEjmZD7AS8cjmRpFGfSSDA&s">
            <h3>Fridge</h3>
            <p>Starting From Rs11150.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://eeslmart.in/images/thumbs/0000200_emergency-led-bulb-10-watt-1050-lumens.png">
            <h3>bulb</h3>
            <p>Starting From Rs250.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://p2-ofp.static.pub/ShareResource/na/landing-pages/monitor-buying-guide/blades/lenovo-monitors-size-mobile.jpg">
            <h3>Monitor</h3>
            <p>Starting From Rs15,000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://cdn.thewirecutter.com/wp-content/media/2024/09/beardtrimmers-2048px-1.jpg">
            <h3>Trimmer</h3>
            <p>Starting From Rs700.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://static1.xdaimages.com/wordpress/wp-content/uploads/wm/2024/08/keyboards-different-layouts-sizes-desk.jpg">
            <h3>Keyboards</h3>
            <p>Starting From Rs5000.00</p>
            <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://www.goldmedalindia.com/blog/wp-content/uploads/2023/11/Understanding-Ceiling-Fan-Power-Consumption.jpg">
            <h3>Premium Electric fan</h3>
            <p> Starting From Rs2000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ82scJL89Db4gtD82Pnl4eo9Sv5Qe5emPcmg&s">
            <h3>Gaming controler</h3>
            <p>Starting From Rs3000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://m.media-amazon.com/images/I/71qa1XXYXRL._AC_UF1000,1000_QL80_.jpg">
            <h3>Electric brush</h3>
            <p>Starting From Rs2500.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://cdn.prod.website-files.com/5de2db6d3719a1e2f3e4454c/64f29c9188ced1d23f099a1f_9%20Best%20Printers%20for%20Graphic%20Design%20in%202023%20(1).webp">
            <h3>Printer machine</h3>
            <p>Starting From Rs8000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://images.summitmedia-digital.com/spotph/images/2020/11/26/power-banks-laptop-640-1606395178.jpg">
            <h3>Premium Power bank</h3>
            <p> Starting From Rs4500.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://www.stuff.tv/wp-content/uploads/sites/2/2023/05/Best-Smartwatch-2023-Lead.jpg?w=1080">
            <h3>smart watch</h3>
            <p> Starting From Rs3000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://cdn.anscommerce.com/image/tr:e-sharpen-01,h-1500,w-1500,cm-pad_resize/catalog/philipspc/product/HP8643-56/HP8643-56_1.jpg">
            <h3>Heir Dryer</h3>
            <p>Starting From 500/-Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://www.gorefurbo.com/cdn/shop/collections/Refurbished_Mobile_Phones_1.jpg?v=1695978895">
            <h3>Mobile phones</h3>
            <p> Starting From Rs22,500.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://images.philips.com/is/image/philipsconsumer/vrs_53e0a230bdf6cd9864d7219c7d83c8b043d675cb?wid=700&hei=700&$pnglarge$">
            <h3>Iron</h3>
            <p>Starting From Rs5500.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://mtunda.ug/cdn/shop/collections/SOUNDBAR_3.jpg?v=1691255506&width=750">
            <h3>Sound box</h3>
            <p>Starting From Rs8000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://3.imimg.com/data3/CY/XW/MY-3567416/pen-drive-500x500.jpg">
            <h3>Pen drive</h3>
            <p>Starting From Rs1960.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
        <div class="card">
            <img src="https://www.autofresh.in/wp-content/uploads/2024/06/vacmaster-easyclean-spot-cleaner-450x450.jpg">
            <h3>vacum cleaner</h3>
            <p>Starting From Rs50000.00</p>
             <a button class="btn"onclick="displayForm('login-form')">Explor More</a>
        </div>
    </div>
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