<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // Redirect to login page if not logged in
    header("Location: homepage.php");
    exit;
}

// Handle logout request
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to homepage
    header("Location: homepage.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThreadHeaven</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

</head>
<style>
      /* Add some basic styling to the header */
        header {
            background-color: #1e293b;
            color: white;
            padding: 30px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-message {
            font-size: 16px;
        }

        .admin-message {
            font-size: 16px;
            font-weight: bold;
            color: gold;
        }
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body::-webkit-scrollbar,
.main-content::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}
/* Hide scrollbars on the entire page */
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: seashell;
    color: #333;
}

/* Admin Panel Layout */
.admin-panel {
    display: flex;
    height: 100vh;
    overflow: hidden;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: #1e293b;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    padding: 1rem 0;
    border-right: 1px solid #3b4556;
    height: 100%; /* Full height */
    overflow-y: auto; /* Enable vertical scrolling */
}

.sidebar h2 {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 2rem;
    letter-spacing: 1px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 1rem 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: #cbd5e1;
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    transition: background 0.3s ease, color 0.3s ease;
    font-size: 1rem;
}

.sidebar ul li a i {
    margin-right: 1rem;
    font-size: 1.2rem;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
    background: #3b4556;
    color: #ffffff;
}

/* Main Content */
.main-content {
    flex: 1;
    padding: 2rem;
    overflow-y: auto; /* Allow scrolling for the main content */
}

.main-content section {
    display: none;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.main-content section.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.main-content h2 {
    margin-bottom: 1.5rem;
    font-size: 2rem;
    font-weight: 600;
    color: #1e293b;
}

/* Responsive Design */
@media (max-width: 768px) {
    .admin-panel {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }

    .analytics {
        flex-direction: column;
    }
}


/* Tables */
table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

table thead {
    background-color: #1e293b;
    color: #ffffff;
    text-align: left;
}

table th,
table td {
    padding: 1rem;
    font-size: 0.95rem;
}

table tbody tr:nth-child(even) {
    background-color: #f8fafc;
}

table tbody tr:hover {
    background-color: #e2e8f0;
}

/* Analytics Section */
.analytics {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.chart {
    flex: 1;
    min-width: 250px;
    padding: 1.5rem;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-size: 1.1rem;
    color: #4b5563;
}

/* Responsive Design */
@media (max-width: 768px) {
    .admin-panel {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }

    .analytics {
        flex-direction: column;
    }
}



</style>
<body>

    <div class="admin-panel">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="#user-data"><i class="fas fa-users"></i> User Data</a></li>
                <li><a href="#product-upload"><i class="fas fa-upload"></i> Product Upload</a></li>
                 <li><a href="#product-display"><i class="fas fa-tv tv-icon"></i> Product Display</a></li>
                <li><a href="#warehouse"><i class="fas fa-warehouse"></i> Warehouse</a></li>
                <li><a href="#order-tracking"><i class="fas fa-truck"></i> Order Tracking</a></li>
                <li><a href="#pending-orders"><i class="fas fa-box"></i> Pending Orders</a></li>
                <li><a href="#sales-transactions"><i class="fas fa-chart-line"></i> Sales Transactions</a></li>
                <li><a href="#roi-section"><i class="fas fa-chart-pie"></i> ROI & Analytics</a></li>
                <li><a href="#Contact"><i class="fas fa-envelope"></i> Contact </a></li>
                  <li><a href="javascript:void(0);" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout </a></li>

            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="main-content">
            <header>
    <div class="logo">
        <a href="index.php" style="color: white; text-decoration: none;">THREADHEAVEN</a>
    </div>

    <div class="welcome-message">
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_email'])) {
            // Display different messages for admin and regular user
            if ($_SESSION['user_role'] == 'admin') {
                echo "<span class='admin-message'>Welcome back, Admin " . ($_SESSION['user_name'] ?? $_SESSION['user_email']) . "</span>";
            } else {
                echo "Welcome back, " . ($_SESSION['user_name'] ?? $_SESSION['user_email']);
            }
        } else {
            // If not logged in, show login link
            echo "<a href='homepage.php' style='color: white;'>Login</a>";
        }
        ?>
    </div>
</header>
            <!-- User Data Section -->
            <section id="user-data">
   
    <div id="upload-container">
                <!-- This iframe embeds your upload.php functionality -->
        <iframe src="user_disp.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</section>

          <!-- Product Upload Section -->
<section id="product-upload">
   
    <div id="upload-container">
                <!-- This iframe embeds your upload.php functionality -->
        <iframe src="product_management.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</section>
          <!-- Product display Section -->
<section id="product-display">
  
    <div id="upload-container">
                <!-- This iframe embeds your upload.php functionality -->
        <iframe src="dispall.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</section>




            <!-- Warehouse Section -->
         <section id="warehouse">
    <h2>Out Of Stock Products</h2>
    <div id="upload-container">
        <!-- This iframe embeds your upload.php functionality -->
        <iframe src="Outof.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</section>
            <!-- Order Tracking Section -->
            <section id="order-tracking">
                <h2>Order Tracking</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>Status</th>
                            <th>Dispatcher</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows populated from backend -->
                    </tbody>
                </table>
            </section>

            <!-- Pending Orders Section -->
            <section id="pending-orders">
                <h2>Pending Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Packaging</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows populated from backend -->
                    </tbody>
                </table>
            </section>

            <!-- Sales Transactions Section -->
            <section id="sales-transactions">
                <h2>Sales Transactions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic rows populated from backend -->
                    </tbody>
                </table>
            </section>

            <!-- ROI and Visualization Section -->
            <section id="roi-section">
                <h2>ROI & Analytics</h2>
                <div class="analytics">
                    <div class="chart" id="sales-chart">Sales Chart</div>
                    <div class="chart" id="roi-chart">ROI Chart</div>
                </div>
            </section>
            <section id="Contact">
  
    <div id="upload-container">
                <!-- This iframe embeds your upload.php functionality -->
        <iframe src="contact_display_reply.php" style="width: 100%; height: 500px; border: none;"></iframe>
    </div>
</section>
        </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".sidebar ul li a");
    const sections = document.querySelectorAll("section");

    navLinks.forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault();

            // Remove active class from all
            navLinks.forEach(link => link.classList.remove("active"));
            sections.forEach(section => {
                section.classList.remove("active");
                section.style.display = "none";
            });

            // Add active class to the clicked link and section
            const targetId = link.getAttribute("href").substring(1);
            document.getElementById(targetId).classList.add("active");
            document.getElementById(targetId).style.display = "block";
        });
    });

    // Show the first section by default
    if (sections.length > 0) {
        sections[0].classList.add("active");
        sections[0].style.display = "block";
        navLinks[0].classList.add("active");
    }
});

    </script>
    <script>
        function logout() {
            // Send a request to the same page to logout
            window.location.href = window.location.href + "?logout=true";
        }
    </script>
</body>
</html>
