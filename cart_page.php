<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Cart Section</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
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
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
}

/* Show Cart */
.cart-container.show {
    transform: translateX(0);
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

/* Cart Items in Row Format */
.cart-items {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 10px 0;
}

.cart-item {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f9f9f9;
    padding: 10px;
    border-radius: 8px;
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
}

.remove-btn:hover {
    background-color: #ff2a2a;
}



</style>
</head>
<body>

    <!-- Cart Button -->
    <a href="#" id="cart"><i class="fas fa-shopping-cart"></i> Cart</a>

   <!-- Cart Section (Initially Hidden) -->
<!-- Cart Section (Initially Hidden) -->
<div id="cartSection" class="cart-container">
    <div class="cart-header">
        <h2>Your Cart</h2>
        <button id="closeCart">×</button>
    </div>
    <div id="cartItems" class="cart-items"></div>
   
    <button class="proceed-btn">Proceed to Pay</button>
    <div id="payment-section"></div>  <!-- This is where payment options will appear -->
</div>




    <script src="script.js"></script>
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
// Remove item from the cart
function removeFromCart(productId) {
    fetch("fetch_cart.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            action: 'remove',
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Refresh the cart data after removal
            fetchCartData();
        } else {
            alert('Failed to remove item: ' + data.message);
        }
    })
    .catch(error => {
        console.error("Error removing item:", error);
        alert("Error removing item");
    });
}

// Close Cart Functionality
document.getElementById("closeCart").addEventListener("click", function () {
    document.getElementById("cartSection").classList.remove("show");
});


// Proceed to Pay Button Click Event
document.querySelector(".proceed-btn").addEventListener("click", function () {
    fetchUserDetails(); // Fetch user details and show payment options
});
// Function to fetch user details
function fetchUserData() {
    fetch("fetch_user.php") // Calls the separate PHP file
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showPaymentOptions(data.user);
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error("Error fetching user details:", error);
        });
}

// Function to show payment options below "Proceed to Pay"
function showPaymentOptions(user) {
    let paymentSection = document.getElementById("payment-section");

    // Clear previous content (if any)
    paymentSection.innerHTML = "";

    let paymentHTML = `
        <div class="payment-container">
            <h3>Payment Options</h3>
            <p><strong>Name:</strong> ${user.name}</p>
            <p><strong>Email:</strong> ${user.email}</p>
            <p><strong>Address:</strong> ${user.address}</p>

            <p>Select Payment Method:</p>
            <label><input type="radio" name="paymentMethod" value="credit_card"> Credit Card</label>
            <label><input type="radio" name="paymentMethod" value="paypal"> PayPal</label>
            <label><input type="radio" name="paymentMethod" value="cod"> Cash on Delivery</label>

            <button onclick="confirmPayment()">Confirm Payment</button>
        </div>
    `;

    // Insert payment options below the button
    paymentSection.innerHTML = paymentHTML;
}

// Attach event to "Proceed to Pay" button
document.querySelector(".proceed-btn").addEventListener("click", function () {
    fetchUserData(); // Fetch user details dynamically
});
 </script>


</body>
</html>
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
