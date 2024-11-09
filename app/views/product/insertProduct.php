<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "product_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    createRecord($conn);
}

function createRecord($conn) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price)
            VALUES ('$name', '$description', '$price')";

    $conn->query($sql);
    header("Location: index.php"); // Redirect to the product page
}

$conn->close();


?>
