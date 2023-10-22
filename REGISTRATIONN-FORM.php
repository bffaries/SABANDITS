<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <title>RB | Royal Beauty</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>
<div class="wrapper">
    <form method="post" action="register.php">
        <h1> Register Here </h1>
        
        <div class="input-box">
            <input type="text" name="fullname" placeholder="Fullname" class="form-control" required>
            <label for="fullname" class="form-label"></label>
        </div>
        
        <div class="input-box">
            <input type="text" name="email" placeholder="Email Address" class="form-control" required>
            <label for="email" class="form-label"></label>
        </div>

        <div class="input-box">
            <input type="text" name="username" placeholder="Username" class="form-control" required>
            <label for="username" class="form-label"></label>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
            <label for="password" class="form-label"></label>
        </div>

        <div class="input-box">
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
            <label for="confirm_password" class="form-label"></label>
        </div>
        
        <button type="submit" class="btn"> Register </button>
    </form>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
