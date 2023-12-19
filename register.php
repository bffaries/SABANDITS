<?php
    include_once("db.php");
          
    if(isset($_POST['fullname'])) {
        $full_name = $_POST['fullname'];
        $email_address = $_POST['email'];
        $user_name = $_POST['username'];
        $pass_word = $_POST['password'];
        $conf_pass_word = $_POST['confirm_password'];

        // Check if the passwords match
        if($pass_word != $conf_pass_word){
            echo "Password Mismatch";
            die();
        }

        // Check if the user already exists
        $sql_check_user = "SELECT * FROM `users`
                            WHERE fullname = '$full_name'
                               OR username = '$user_name'";
        
        $user_result = mysqli_query($conn, $sql_check_user);

        if(mysqli_num_rows($user_result) > 0 ) {
            echo "User already exists.";
            die();
        } else {
            // Insert user into the database
            $sql_insert_user = "INSERT INTO `users`
                            (`fullname`, `email`, `username`, `password`)
                            VALUES
                            ('$full_name', '$email_address', '$user_name', '$pass_word')";
            if (mysqli_query($conn, $sql_insert_user)) {
                header("Location: user/index.php");
        exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
?>
