<html>
<head>
    <title>MENS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Form.css">
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
            <img src="https://blog.g3fashion.com/wp-content/uploads/2019/02/thumb-5.jpg" alt="Product 1">
            <h3>Wedding Coats Collection </h3>
            <p>Starting From 1500/-RS</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://static.wixstatic.com/media/2e0846_4d687bebcf5d4dd3bafc90ee971e13de~mv2.png/v1/fill/w_624,h_468,al_c,q_85,enc_auto/2e0846_4d687bebcf5d4dd3bafc90ee971e13de~mv2.png" alt="Product 2">
            <h3>Prince Coats Collection </h3>
            <p>Starting From 1800/-Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://i.ytimg.com/vi/j62r08U7VVU/maxresdefault.jpg" alt="Product 3">
            <h3>Premium Blazzer Collection</h3>
            <p>Staring from 3600/- RS</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://i.ytimg.com/vi/L83KmRJDPl0/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDNmq_G5fDy4QAoKdvL0rSsXCb0FQ" alt="Product 4">
            <h3>Sherwani Collection</h3>
            <p>Starting From 3550/- RS</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://3.imimg.com/data3/SS/LS/MY-14047464/formal-shirts-500x500.jpg" alt="Product 1">
            <h3>Formal Shirt Collection</h3>
            <p>starting from 1000/- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://ramrajcotton.in/cdn/shop/files/2304-9680H40LF5-19241.jpg?v=1718194515&width=1080" alt="Product 2">
            <h3>Black Collection</h3>
            <p>Starting From 500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://images.naptol.com/usr/local/csp/staticContent/product_images/horizontal/750x750/Collection-of-4-T-Shirts-for-Men(4RT2)-1.jpg" alt="Product 3">
            <h3>Tshirt Collection</h3>
            <p>Starting From 350/- RS</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ18BNFxSZm472eb5pbdWc0ZNzFHTxSp6HWXQ&s" alt="Product 4">
            <h3>Premium Watch  Collection</h3>
            <p>Starts from 1000 /- Rs</p>
            <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://alonzoshoes.in/cdn/shop/files/DSC_0712-PhotoRoom_1.jpg?v=1703764708" alt="Product 1">
            <h3>Leather Shoes</h3>
            <p>Starting From 1500/- Rs</p>
           <a button class="btn"onclick="displayForm('login-form')">Explore More</a>        </div>
        <div class="card">
            <img src="https://www.mystore.in/s/62ea2c599d1398fa16dbae0a/665715991691e4002b9c5c9e/white-shoes-4.jpg" alt="Product 2">
            <h3>Sport Shoes</h3>
            <p>Staring From 500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://paragonfootwear.com/cdn/shop/products/K11239G_BLK_1.jpg?v=1693464971&width=1920" alt="Product 3">
            <h3>Formal Shoes</h3>
            <p>Starting From 1500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>        </div>
        <div class="card">
            <img src="https://www.mcaffeine.com/cdn/shop/files/851CBEB6-C392-48E1-A118-0880244C0173.jpg?v=1728099601" alt="Product 4">
            <h3>Perfume Collection</h3>
            <p>Starting From 250/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://carltonlondon.co.in/cdn/shop/products/1_3f9633ac-77a5-46a8-9b9d-ca4c37ffa1e7.jpg?v=1705483259" alt="Product 1">
            <h3>Premium Perfume</h3>
            <p>Starting From 500/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://media.beautyplaza.com/data/hbb24/width320/454880.jpg" alt="Product 2">
            <h3>Boss Perfume </h3>
            <p>Starting from 450/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://www.voyageeyewear.com/cdn/shop/files/2_2d7a94d1-ef5b-4e51-81f2-2e829f15f5e4.jpg?v=1714424530&width=2500" alt="Product 3">
            <h3>Sunglass Collection</h3>
            <p>Starting From 250/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://lp2.hm.com/hmgoepprod?set=quality%5B79%5D%2Csource%5B%2F18%2F39%2F1839e87234ed66ab20d9eed0eba0173bb1aa10af.jpg%5D%2Corigin%5Bdam%5D%2Ccategory%5B%5D%2Ctype%5BENVIRONMENT%5D%2Cres%5Bm%5D%2Chmver%5B2%5D&call=url[file:/product/main]" alt="Product 4">
            <h3>Sunglass  Collection</h3>
            <p>Starting From 450/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://images.meesho.com/images/products/142474229/lfoq1_512.jpg" alt="Product 1">
            <h3>Formal Cotton Pants </h3>
            <p>Starting From 450/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://ghpc.in/cdn/shop/files/ghpc-polyester-pin-checks-pant-for-men-beige-ghpc-1-35288246223124.jpg?v=1705235846&width=2048" alt="Product 2">
            <h3>Silk Pants Collection</h3>
            <p>Starting From 550/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://www.jockey.in/cdn/shop/products/UM45_BLKSN_0103_S223_JKY_1.webp?v=1700007173" alt="Product 3">
            <h3>Pants Collection</h3>
            <p>Starting From 550/- Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
        </div>
        <div class="card">
            <img src="https://m.media-amazon.com/images/I/51WmYJ3wdgL._AC_UY1100_.jpg" alt="Product 4">
            <h3>Jeans Pants Collection</h3>
            <p>Starting From 450/-Rs</p>
             <a button class="btn"onclick="displayForm('login-form')">Explore More</a>
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
