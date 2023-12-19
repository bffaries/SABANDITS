<?php
    $host = 'localhost';
    $db_name = 'rb';
    $db_user = 'root';
    $db_pass = '';

    $conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } ;
?>
