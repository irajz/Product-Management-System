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
        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .charts-card {
            background-color: #ffffff;
            margin-bottom: 20px;
            padding: 25px;
            box-sizing: border-box;
            -webkit-column-break-inside: avoid;
            border: 1px solid #d2d2d3;
            border-radius: 5px;
            box-shadow: 0 6px 7px -4px rgba(0, 0, 0, 0.2);
        }

        .chart-title {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 600;
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
    <div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-danger mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <h2 class="card-subtitle mb-2 text-body-secondary">1,523</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total product stock</h5>
                        <h2 class="card-subtitle mb-2 text-body-secondary">2,256</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success mb-3" style="width: 15rem;">
                    <div class="card-body">
                        <h5 class="card-title">Pending orders</h5>
                        <h2 class="card-subtitle mb-2 text-body-secondary">352</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="charts">

<div class="charts-card">
  <p class="chart-title">Top 5 Products</p>
  <div id="bar-chart"></div>
</div>

<div class="charts-card">
  <p class="chart-title">Purchase and Sales Orders</p>
  <div id="area-chart"></div>
</div>

</div>
    </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>