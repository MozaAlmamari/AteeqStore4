<?php
// setting up the database connection
$servername = "localhost";  // define the database server
$username = "root";         // database username (default is "root" for local setups)
$password = "";             // database password (leave empty for local setups)
$dbname = "ateeqstore";     // name of the database to connect to

// create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check if the connection is successful, if not, terminate with an error message
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // display connection error and stop the script
}

// searching for products
$searchResults = [];  // array to store search results
if (isset($_GET['search'])) {  // check if there is a search term in the GET request
    // sanitize the input to prevent SQL injection
    $searchTerm = $conn->real_escape_string($_GET['search']);
    
    // SQL query to search for products by name, using LIKE for partial matching
    $sql = "SELECT * FROM product WHERE ProductName LIKE '%$searchTerm%'";
    $result = $conn->query($sql);  // execute the query
    
    // if query returns results, fetch them into the $searchResults array
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;  // add each product to the search results array
        }
    }
}

// Adding a new product
if (isset($_POST['addProduct'])) {  // check if the form to add a product was submitted
    // canitize the form inputs to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = $conn->real_escape_string($_POST['price']);
    $weight = $conn->real_escape_string($_POST['weight']);

    // SQL query to insert a new product into the database (ProductID will auto-increment)
    $sql = "INSERT INTO product (ProductName, Category, Price, Description, Quantity) 
            VALUES ('$name', '$category', '$price', '$weight', 0)";  // assuming quantity starts at 0
    // check if the query executed successfully
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully!');</script>";  // display success message
    } else {
        echo "<script>alert('Error adding product: " . $conn->error . "');</script>";  // display error message
    }
}

// Deleting a product based on its ID
if (isset($_POST['deleteProduct'])) {  // check if the form to delete a product was submitted
    // get the product ID from the form input (sanitize it by converting to integer)
    $productId = intval($_POST['productId']);
    
    // SQL query to delete the product from the database
    $sql = "DELETE FROM product WHERE ProductID = $productId";
    // check if the query executed successfully
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully!');</script>";  // success message
    } else {
        echo "<script>alert('Error deleting product: " . $conn->error . "');</script>";  // Error message
    }
}

// fetching all products to display them in a table
$allProducts = [];  // array to store all products
$sql = "SELECT * FROM product";  // SQL query to fetch all products
$result = $conn->query($sql);  // execute the query
if ($result) {
    // loop through the result set and add each product to the $allProducts array
    while ($row = $result->fetch_assoc()) {
        $allProducts[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>

    <link rel="stylesheet" href="theme.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .section {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .section:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);   
        }

    
        .btn-primary {
            background-color: #4a2c2a !important;
            border-color: #4a2c2a !important;
        }

        .btn-primary:hover {
            background-color: #3e251f !important;
            border-color: #3e251f !important;
        }
    </style>
</head>
<body>


<header>
    <div class="header-container">
        <img src="Picture1.png" alt="Ateeq Logo" class="logo">
        <h1>Manage Products</h1>
        <nav>
            
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="community.html">Community</a></li>
                <li><a href="contact(Questionnaire).html">Contact Us</a></li>
                <li><a href="myaccount(calculation).html">My Account</a></li>
                <li><a href="aboutUs.html">About Us</a></li>
                <li><a href="fungame.html">Fun Game</a></li>
                <li><a href="manage.php">Manage Products</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- main content of the page -->
<main class="container mt-4">
    <!-- section for searching products -->
    <div class="section">
        <h3>Search for Products</h3>
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for products..." required>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- display the search results if there are any -->
        <?php if (!empty($searchResults)): ?>
            <h4>Search Results</h4>
            <ul class="list-group mb-4">
                <?php foreach ($searchResults as $product): ?>
                    <li class="list-group-item">
                        <strong><?php echo htmlspecialchars($product['ProductName']); ?></strong> - 
                        Category: <?php echo htmlspecialchars($product['Category']); ?>, 
                        Price: <?php echo htmlspecialchars($product['Price']); ?> OR, 
                        Weight: <?php echo htmlspecialchars($product['Description']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <!-- section for adding a new product -->
    <div class="section">
        <h3>Add New Product</h3>
        <form method="POST" class="mb-4">
            <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
            <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
            <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Price" required>
            <input type="text" name="weight" class="form-control mb-2" placeholder="Weight (kg)" required>
            <button type="submit" name="addProduct" class="btn btn-success">Add Product</button>
        </form>
    </div>

    <!-- section for deleting a product -->
    <div class="section">
        <h3>Delete Product</h3>
        <form method="POST" class="mb-4">
            <input type="number" name="productId" class="form-control mb-2" placeholder="Product ID" required>
            <button type="submit" name="deleteProduct" class="btn btn-danger">Delete Product</button>
        </form>
    </div>

    <!-- section for displaying all products -->
    <div class="section">
        <h3>All Products</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price (OR)</th>
                    <th>Weight (kg)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allProducts as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['ProductID']); ?></td>
                        <td><?php echo htmlspecialchars($product['ProductName']); ?></td>
                        <td><?php echo htmlspecialchars($product['Category']); ?></td>
                        <td><?php echo htmlspecialchars($product['Price']); ?></td>
                        <td><?php echo htmlspecialchars($product['Description']); ?></td> <!-- Weight stored as Description -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- footer section of the page -->
<footer>
    <p>&copy; 2024 Ateeq. All rights reserved.</p>
</footer>

<!-- close the database connection -->
<?php $conn->close(); ?>

</body>
</html>
