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

if (isset($_POST['update'])) {
    updateRecord($conn);
}



function updateRecord($conn) {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];

    $sql = "UPDATE products 
            SET name='$product_name', description='$product_description', price='$product_price' 
            WHERE id='$product_id'";
            

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to the product page
    } else {
        echo "error updating record: " . $conn->error;
    }
    
}

$conn->close();


?>