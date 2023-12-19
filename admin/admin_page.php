<?php

    @include 'db.php';

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $product_image_tmp_name = $_FILES['image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$image;

   if(empty($name) || empty($price) || empty($image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO items(name, price, image) VALUES('$name', '$price', '$image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM items WHERE id = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RB | Royal Beauty</title>
</head>
<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="" class="active">DASHBOARD</a></li>
            <li><a href="manage_orders.php">Orders</a></li>
            <li><a href="">Reports</a></li>
        </ul>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>
</head>
<body>
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="name" class="box">
         <input type="number" placeholder="enter product price" name="price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM items");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="image/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>Php <?php echo $row['price']; ?> </td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>