<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>RB | Royal Beauty</title>
</head>
<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="account.php" class="active">Account</a></li>
        </ul>

        <div class ="menu-btn">
            <i class="fa fa-bars"></i>
        </div>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>

    <div class="wrapper">
    <form action="login.php" method="post" onsubmit="return validateLogin()" id="loginForm">
        <h1> Login</h1>
            <div class="input-box">
            <input type="text" name="username" placeholder="username" required>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <button type="Submit" class="btn"> Login </button>

        <div class="register-link">
        <p> Don't have an account? <a href="registration.php">Register here</a></p>

        <script>
            function validateLogin() {
                var username = document.querySelector('input[type="text"]').value;
                var password = document.querySelector('input[type="password"]').value;

                if (!username || !password) {
                alert("Both username and password are required.");
                return false;
        }
        return true;
    }
</script>

        </form>
    </div>
</body>
</html> 