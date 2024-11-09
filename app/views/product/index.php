<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuToProD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.google.com/noto/specimen/Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 50px;
            height: 100%;
            background-color: var(--mainColor);
            z-index: 1;
            padding-top: 70px;
        }

        .sidebar-menu {
            width: 100%;
            text-align: center;
            padding: 10px 5px;
            color: var(--darkGrey);
        }

        .sidebar-menu > a {
            text-decoration: none;
            font-size: 0.7rem;
            line-height: 1.5;
            color: var(--darkGrey);
        }

        .sidebar-menu:hover {
            border-right: 2px solid var(--yellow);
            color: var(--yellow);
        }

        .sidebar-menu:hover > a {
            color: var(--yellow);
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
        
        <div class="sidebar">
            <div class="sidebar-menu">
                <span class="fas fa-search"></span>
                <a href="#">Search</a>
            </div>
            <div class="sidebar-menu">
                <span class="fas fa-home"></span>
                <a href="home.php">Home</a>
            </div>
            <div class="sidebar-menu">
                <span class="fas fa-add"></span><br>
                <a href="create.php">Add</a>
            </div>
            <div class="sidebar-menu">
                <span class="fas fa-bars"></span>
                <a href="index.php">View</a>
            </div>
            <div class="sidebar-menu">
                <span class="fas fa-sliders-h"></span>
                <a href="#">Setting</a>
            </div>
        </div>

        <h1>Product List</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
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

                $tableName = "products";

                $sql = "SELECT * FROM products";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row["id"] . "</th>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo "<a href='deleteProduct.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No results found";
                }

                $conn->close();
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var path = window.location.pathname;
            var page = path.split("/").pop().split(".")[0];
            $(".nav-item").removeClass("active");
            if (page === "home") {
                $("#home").addClass("active");
            } else if (page === "index") {
                $("#view-product").addClass("active");
            } else if (page === "create") {
                $("#add-product").addClass("active");
            } else if (page === "logout.") {
                $("#logout").addClass("active");
            }
        });
    </script>
</body>

</html>
