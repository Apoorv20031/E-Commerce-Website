<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        /* General Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        /* Hide scrollbars on the entire page */
::-webkit-scrollbar {
    display: none; /* Hide the scrollbar */
}


        h1 {
            text-align: center;
            margin: 20px 0;
            font-size: 2.5em;
            color: #007bff;
            font-weight: 600;
        }

        /* Form Styling */
        form {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        button {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1em;
            outline: none;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #555;
            background-color: #fff;
        }

        /* Input Hover and Focus */
        input[type="text"]:hover,
        input[type="number"]:hover,
        textarea:hover,
        select:hover {
            border-color: #007bff;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        /* Textarea Styling */
        textarea {
            resize: none;
            height: 100px;
        }

        /* Button Styling */
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 1.2em;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        button:active {
            background-color: #004494;
            transform: translateY(0);
        }

        /* Drag-and-Drop Box Styling */
        .drag-box {
            width: 100%;
            height: 150px;
            border: 2px dashed #007bff;
            border-radius: 12px;
            background-color: #f9f9f9;
            color: #555;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, border 0.3s ease;
        }

        .drag-box:hover {
            background-color: #007bff;
            color: #fff;
            border: 2px dashed #fff;
        }

        .drag-box.active {
            background-color: #e1f7ff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            input[type="text"],
            input[type="number"],
            textarea,
            select,
            button {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <h1>Manage Products</h1>
    <form id="productForm" enctype="multipart/form-data" method="POST" action="upload.php">
        <!-- Drag-and-Drop Box -->
        <div id="dragBox" class="drag-box" onclick="triggerFileInput()" ondrop="handleDrop(event)" ondragover="handleDragOver(event)">
            Drag and drop an image here or click to select a file
        </div>
        
        <!-- Hidden File Input -->
        <input type="file" id="imageUpload" name="productImage" accept="image/*" required style="display:none;" onchange="updateDragBox(this)">

        <!-- Page Selection Dropdown -->
        <select name="productPage" required>
            <option value="products">Products</option>
            <option value="men">Men</option>
            <option value="women">Women</option>
            <option value="electronic">Electronic</option>
        </select>

        <input type="text" name="productName" placeholder="Product Name" required>
        <input type="number" name="productPrice" placeholder="Price" required>
        <input type="number" name="productDiscount" placeholder="Discount (%)" required>
        <textarea name="productDescription" placeholder="Description"></textarea>
        <input type="number" name="productRatings" placeholder="Ratings (1-5)" required>
        <select name="productAvailability" required>
            <option value="Available">Available</option>
            <option value="Out of Stock">Out of Stock</option>
        </select>

        <!-- Shoe Size Section -->
        <fieldset>
            <legend>Shoe Size Options</legend>
            <label><input type="checkbox" name="shoeSize[]" value="US 6"> US 6</label><br>
            <label><input type="checkbox" name="shoeSize[]" value="US 7"> US 7</label><br>
            <label><input type="checkbox" name="shoeSize[]" value="US 8"> US 8</label><br>
            <label><input type="checkbox" name="shoeSize[]" value="US 9"> US 9</label><br>
            <label><input type="checkbox" name="shoeSize[]" value="US 10"> US 10</label><br>
        </fieldset>

        <!-- Cloth Size Section -->
        <fieldset>
            <legend>Cloth Size Options</legend>
            <label><input type="checkbox" name="clothSize[]" value="S"> Small (S)</label><br>
            <label><input type="checkbox" name="clothSize[]" value="M"> Medium (M)</label><br>
            <label><input type="checkbox" name="clothSize[]" value="L"> Large (L)</label><br>
            <label><input type="checkbox" name="clothSize[]" value="XL"> Extra Large (XL)</label><br>
        </fieldset>

        <button type="submit">Save Product</button>
    </form>

    <script>
        // Trigger file input click when the drag box is clicked
        function triggerFileInput() {
            document.getElementById("imageUpload").click();
        }

        // Handle the drag over event to allow dropping
        function handleDragOver(event) {
            event.preventDefault();
            document.getElementById("dragBox").classList.add("active");
        }

        // Handle the drop event to update the drag box and input field
        function handleDrop(event) {
            event.preventDefault();
            document.getElementById("dragBox").classList.remove("active");
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                const file = files[0];
                document.getElementById("imageUpload").files = files;
                document.getElementById("dragBox").innerText = `File selected: ${file.name}`;
            }
        }

        // Update the drag box text when a file is selected
        function updateDragBox(input) {
            const file = input.files[0];
            if (file) {
                document.getElementById("dragBox").innerText = `File selected: ${file.name}`;
            }
        }
    </script>
</body>
</html>
