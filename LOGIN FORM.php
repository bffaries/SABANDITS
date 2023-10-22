<html> 
<head>
    <title>RB | Royal Beauty</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <!-- Login Here -->
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

        <!-- Add a link to the registration page -->
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
    }
            </script>
        </form>
    </div>
</body>
</html> 