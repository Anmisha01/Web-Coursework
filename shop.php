<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "kumaradhika123";
$dbname = "anmishoe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT id, name, description, price, image FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Anmishoe</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="logo">Anmishoe</div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Our Shop</h1>
        <h3>Footwear for Men and Women</h3>
        <div class="product-grid">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<h2>' . $row["name"] . '</h2>';
                    echo '<p>$' . number_format($row["price"], 2) . '</p>';
                    echo '<button>Add to Cart</button>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </main>

    <footer>
        <p>© 2024 Anmishoe. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
