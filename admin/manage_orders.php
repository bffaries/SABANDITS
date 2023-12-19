
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ihomepage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>RB | Royal Beauty</title>
</head><?php
// Include your database connection file
@include 'db.php';

// Fetch order history data from the database
$orderHistoryQuery = mysqli_query($conn, "SELECT * FROM orders ORDER BY user_id DESC");
$orderHistory = mysqli_fetch_all($orderHistoryQuery, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    
<title>RB | Order History</title>

<body>
    <nav class="navbar">
    <div class="logo"><h1>Royal Beauty</h1></div>
        <ul class="menu">
            <li><a href="admin_page.php">DASHBOARD</a></li>
            <li><a href="manage_orders.php" class="active">Orders</a></li>
            <li><a href="">Reports</a></li>
        </ul>

        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
    </nav>

<body>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .order-history {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 2px solid black;
        }

        th, td {
            padding: 10px;
        }
    </style>
</head>
    <div class="order-history">
        <h1>Order History</h1>

        <?php if (empty($orderHistory)): ?>
            <p>No orders found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <table border = "2">
                    <tr>
                        <th>User ID</th>
                        <th>Item ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th> Order Status</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($orderHistory as $order): ?>
                        <tr>
                            <td><?php echo $order['user_id']; ?></td>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['image']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php echo $order['price']; ?></td>
                            <td><?php echo $order['quantity'] * $order['price']; ?></td>
                            <td><?php echo $order['order_status']; ?></td>

                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>