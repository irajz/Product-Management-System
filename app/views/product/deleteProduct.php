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

function deleteRecord($conn) {
    $tableName = "products";
    $idToDelete = $_GET["id"];

    $sql = "DELETE FROM products WHERE id=$idToDelete";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting data: " . $conn->error;
    }

}

deleteRecord($conn);

// Close connection
$conn->close();
?>
