<?php

    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_password = "";
    $db_name = "rb";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];


    // Check if the product is already in the cart
    $select_cart = mysqli_query($conn, "SELECT * FROM `orders` WHERE item_id = (SELECT id FROM items WHERE name = '$name')");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to the cart';
    } else {
        // Insert the product into the cart
        $insert_product = mysqli_query($conn, "INSERT INTO `orders` (user_id, id, price, order_status) VALUES (1, (SELECT item_id FROM items WHERE item_name = '$item_name'), '$item_qty', 'P')");

        if ($insert_product) {
            $message[] = 'Product added to the cart successfully';
        } else {
            $message[] = 'Error adding product to the cart: ' . mysqli_error($conn);
        }
    }
}

// Rest of your HTML code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>RB | ADMIN</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="products.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="admin_page.php">DASHBOARD</a></li>
            <li><a href="products.php"class="active">Products</a></li>
            <li><a href="manage_orders.php">Orders</a></li>
            <?php
            if (isset($conn)) {
            $select_rows = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
        ?>

      <?php
      } else {
          // Handle the case where $conn is not set
          echo "Database connection not available.";
      }
      ?>
        </ul>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>

    <h1 class="pheading">Products</h1>

    <section class="sec">
        <div class="products">
            <?php
            // Fetch data from the 'items' table
            $sql = "SELECT * FROM items";
            $result = $conn->query($sql);

            // Check if there are rows in the result set
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display product information using the provided CSS classes
                    echo '<div class="card">';
                    echo '<div class="img"><img src="' . $row['image'] . '" alt=""></div>';
                    echo '<div class="title">' . $row['name'] . '</div>';
                    echo '<div class="box">';
                    echo '<div class="price">' . $row['price'] . '</div>';
                
                    // Add the form for each product
                    echo '<form method="post" action="products.php">';
                    echo '<input type="hidden" name="name" value="' . $row['name'] . '">';
                    echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                    echo '<input type="hidden" name="image" value="' . $row['image'] . '">';
                    echo '</form>';
                    
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </section>

    <footer>
        <p>Copyrights at <a href="">Royal Beauty</a></p>
    </footer>

</body>

</html>

<?php
// Close the connection
$conn->close();
?>
