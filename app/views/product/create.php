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
        .sidebar-menu:hover{
            border-right: 2px solid var(--yellow);
            color: var(--yellow);
        }
        .sidebar-menu:hover > a {
            color: var(--yellow);
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
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">View Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add Product</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
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
    <body>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="insertProduct.php" method="post">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>

</html>