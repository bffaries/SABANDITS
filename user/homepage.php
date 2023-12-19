<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RB | Royal Beauty</title>
</head>
<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="homepage.php" class="active">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php" class="active"><i class="fas fa-shopping-cart"></i></a></li>
        <?php
            if (isset($conn)) {
            $select_rows = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
        ?>
          <a href="cart.php" class=""><span><?php echo $row_count; ?></span> </a>
      <?php
        } 
      ?>
      
        </ul>

        <div class ="menu-btn">
            <i class="fa fa-bars"></i>
        </div>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>

    <section class="content">
        <h1>Welcome to Royal Beauty</h1>
        <p>Makeup is magic. Let us cast a spell on you!</p>
        <button>Shop Now</button>
    </section>

    <h1 class="pheading">Best Seller</h1>

    <section class="sec">
        <div class="products">

        <div class="card">
            <div class="img"><img src="image/1.jpg" alt=""></div>
            <div class="title">lipstick</div>
            <div class="box">
                <div class="price">299.00</div>
                <div class="btn">Add to Cart</div>
        </div>
        </div>

        <div class="card">
            <div class="img"><img src="image/3.jpg" alt=""></div>
            <div class="title">mascara</div>
            <div class="box">
                <div class="price">225.00</div>
                <div class="btn">Add to Cart</div>
        </div>
        </div>


        <div class="card">
            <div class="img"><img src="image/5.jpg" alt=""></div>
            <div class="title">blush</div>
            <div class="box">
                <div class="price">120.00</div>
                <div class="btn">Add to Cart</div>
        </div>
        </div>
        
        <div class="card">
            <div class="img"><img src="image/8.jpg" alt=""></div>
            <div class="title">primer</div>
            <div class="box">
                <div class="price">159.00</div>
                <div class="btn">Add to Cart</div>
        </div>
        </div>
    </section>
    
    <h1 class="pheading">About</h1>

    <footer>
        <p>Copyrights at <a href="">Royal Beauty</a></p>
    </footer>

</body>
</html>