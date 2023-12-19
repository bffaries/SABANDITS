<?php

    @include 'db.php';

    if (isset($_POST['update_update_btn'])) {
        $update_value = $_POST['update_quantity']; // Updated variable name
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET quantity = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('location:cart.php');
         };
    };  

    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$remove_id'");
        header('location:cart.php');
    }

    if (isset($_GET['delete_all'])) {
        mysqli_query($conn, "DELETE FROM `orders`");
        header('location:cart.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RB | Shopping Cart </title> 
</head>

<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
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
    </nav>


   <h1 class="pheading">SHOPPING CART</h1>
   <link rel="stylesheet" href="cart.css">
   <table>

      <thead>
         <th>IMAGE</th>
         <th>PRICE</th>
         <th>QUANTITY</th>
         <th>TOTAL PRICE</th>
         <th>ACTION</th>
      </thead>

      <tbody>

        <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM `orders`");
            $grand_total = 0;
            if (mysqli_num_rows($select_cart) > 0) {
                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        ?>

        <tr>
            <td><img src="image/<?php echo $fetch_cart['image']; ?>" height="150" alt=""></td>
            <td>Php<?php echo number_format($fetch_cart['price']); ?> </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                        <input type="number" name="update_quantity" min="0"value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="submit" value="update" name="update_update_btn">
                </form>
            </td>
            <td>Php <?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"><i class="fas fa-trash"></i> Remove</a></td>
        </tr>
        <?php
        $grand_total += $sub_total;
    };
};
?>

        <tr class="table-bottom">
            <td> </td>
            <td colspan="2">GRAND TOTAL</td>
            <td>₱ <?php echo $grand_total; ?></td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
            
        </tr>

      </tbody>

    </table>
    <div class="option.btn">
    <a href="products.php" class="option-btn" style="margin-top: 0;">CONTINUE SHOPPING</a>
   <div class="checkout-btn">
    <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">CHECK OUT</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
