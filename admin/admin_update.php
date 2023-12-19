<?php

@include 'db.php';

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
    $product_image_tmp_name = $_FILES['image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $image;

    if (empty($name) || empty($price) || empty($image)) {
        $message[] = 'Please fill out all fields.';
    } else {
        $update_data = "UPDATE items SET name='$name', price='$price', image='$image'  WHERE id = '$id'";
        $upload = mysqli_query($conn, $update_data);

        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header('location:admin_page.php');
        } else {
            $message[] = 'Failed to update. Please try again.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
   if(isset($message)){
      foreach($message as $msg){
         echo '<span class="message">'.$msg.'</span>';
      }
   }
?>

<div class="container">
   <div class="admin-product-form-container centered">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `items` WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)) {
      ?>
         <form action="" method="post" enctype="multipart/form-data">
            <h3 class="title">update the product</h3>
            <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
            <input type="number" min="0" class="box" name="price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
            <input type="file" class="box" name="image"  accept="image/png, image/jpeg, image/jpg">
            <input type="submit" value="update product" name="update_product" class="btn">
            <a href="admin_page.php" class="btn">go back!</a>
         </form>
      <?php
      }
      ?>

   </div>
</div>

</body>
</html>
