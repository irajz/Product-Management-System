<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "product_management";

// Create connection
$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Error: Could not execute the query.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AuToProD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@1,300&display=swap');
           *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:"poppins",sans-serif ;
           }
           body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background:url("https://www.omniaccounts.co.za/wp-content/uploads/2022/03/The-Best-Guide-to-an-Inventory-Control-System-for-Your-Business.jpg")no-repeat;
            background-position: center;
            background-size: cover;
           }
           .wrapper{
            width: 420px;
            border-radius: 10px;
            color: #fff;
            padding: 30px 40px;
            background:url("https://images.unsplash.com/photo-1595004583135-1e089b52a09e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNreSUyMGJsdWV8ZW58MHx8MHx8fDA%3D");
           }
           .wrapper h1{
            font-size: 36px;
            text-align: center;
            color: #0a0c78;
           }
           .wrapper h1 span{
            color: #f8f8f8;
           }
           .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
           }
           .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
           }
           .input-box input::placeholder{
            color: #fff;
           }
           .input-box span{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
           }
           .wrapper .remember-forgot{
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
           }
           .remember-forgot label input{
            accent-color: #fff;
            margin-right: 3px;
           }
           .remember-forgot a{
            color: #fff;
            text-decoration: none;
           }
           .remember-forgot a:hover{
            text-decoration: underline;
           }
           .wrapper .btn{
            width: 100%;
            height: 45px;
            background: #0a0c78;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px black;
            cursor: pointer;
            font-size: 16px;
            color: #fefafa;
            font-weight: 600;
           }
           .wrapper .register-link{
            font-size: 14.5px;
            text-align: center;
            margin-top: 20px 0 15px;
            
           }
           .register-link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
           }
           .register-link p a:hover{
            text-decoration: underline;
           }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="signup.php" method="post">
            <h1>Signup<span>Here</span></h1>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="input-box">
                <span class="fas fa-user"></span>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <span class="fas fa-envelope"></span>
                <input type="email" name="email" placeholder="email" required>
            </div>
            <div class="input-box">
                <span class="fas fa-unlock"></span>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" required>I agree to the terms & conditions.</label>
            </div>
            <button class="btn">Sign Up</button>
            <div class="register-link">
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>
