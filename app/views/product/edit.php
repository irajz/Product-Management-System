<?php

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

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

    $sql = "SELECT * FROM products WHERE id = $product_id ";
    $result = $conn->query($sql);

    //check if product exist

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['name'];
        $product_description = $row['description'];
        $product_price = $row['price'];
    } else {
        header("location: index.php");
        exit();  //stop future execution
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 20px;
            background-image: url('KoronaPOS2.0_Container-BG.png');
            background-size: cover;
            background-attachment: fixed;
        }

        .container {
            padding-top: 20px;
        }

        h1 {
            text-align: center;
            padding-top: 20px;
        }

        nav {
            border-radius: 10px;
            font-weight: bold; 
        }

        .navbar-bg {
            background-color: #FFC300;
        }

        .nav-item.active .nav-link {
            color: #000;
            background-color: #FFC300;
        }
    </style>

</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
            <a class="navbar-brand" href="#">AuToProD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" id="home">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item" id="view-product">
                        <a class="nav-link" href="index.php">View Product</a>
                    </li>
                    <li class="nav-item" id="add-product">
                        <a class="nav-link" href="create.php">Add Product</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="logout">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <h1>Edit Product</h1>
        <form action="updateProduct.php" method="post">
            <input type="hidden" name="id" value="<?php echo $product_id; ?>"> 
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value= "<?php echo $product_name; ?>" required> 
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product_description; ?></textarea> 
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value= "<?php echo $product_price; ?>" required> 
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
