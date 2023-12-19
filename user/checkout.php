<?php

@include 'db.php';

$payments = array();

if (isset($_POST['order_btn'])) {

    // Assuming these variables are obtained from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, $_POST['flat']);

    $cart_query = mysqli_query($conn, "SELECT * FROM `orders`");
    $price_total = 0;
    $products = array();

    if (mysqli_num_rows($cart_query) > 0) {
        while ($item = mysqli_fetch_assoc($cart_query)) {
            $products[] = $item['id'] . ' (' . $item['quantity'] . ')';
            $price = $item['price'] * $item['quantity'];
            $price_total += $price;
        }
        // Assign $products to $payments to fix the undefined variable warning
        $payments = $products;
    }

    // ... (your existing code)

    if ($cart_query) {
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
          <h3>thank you for shopping!</h3>
          <div class='order-detail'>
              <span>" . implode(', ', $payments) . "</span>
              <span class='total'> total : Php " . $price_total . "  </span>
          </div>
          <div class='customer-details'>
              <p> your name : <span>" . $name . "</span> </p>
              <p> your number : <span>" . $number . "</span> </p>
              <p> your email : <span>" . $email . "</span> </p>
              <p> your address : <span>" . $address . "</span> </p>
              <p> your payment mode : <span>" . $method . "</span> </p>
          </div>

          <a href='products.php' class='btn'>continue shopping</a>
      </div>
      </div>
      ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="checkout.css">
    <title>RB | Checkout </title>
</head>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete your Order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_order = mysqli_query($conn, "SELECT * FROM `orders`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_order) > 0){
            while($fetch_order = mysqli_fetch_assoc($select_order)){
            $total_price = number_format($fetch_order['price'] * $fetch_order['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_order['price']; ?>(<?= $fetch_order['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : Php <?= $grand_total; ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         
         <div class="inputBox">
            <span>Your Number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>

         <div class="inputBox">
            <span>Your Email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>

         <div class="inputBox">
            <span>Payment Method</span> 
            <select name="method">
               <option value="GCash" data-image="gcash.jpg" selected>GCash</option>
               <img id="gcashImage" src="gcash.jpg" alt="GCash Image">
            </select>
         </div>
         <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder=" " name="flat" required>
         </div>

      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>