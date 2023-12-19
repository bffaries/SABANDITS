<?php
// connect to the database
    $host = 'localhost';
    $db_name = 'rb';
    $db_user = 'root';
    $db_pass = '';

  $conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

  // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // get the user input from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // sanitize the user input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // query the database to find the matching user
    $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // check if the user exists and the password is correct
    if ($result->num_rows > 0) {
    // fetch the user data as an associative array
    $user_data = $result->fetch_assoc();
  // start a session and store the user data in it
  session_start();
  $_SESSION["user_id"] = $user_data["id"];
  $_SESSION["user_name"] = $user_data["name"];
  // redirect the user to the home page
  header("Location: home.php");
} else {
  // display an error message and redirect the user to the login page
  echo "Invalid email or password";
  header("Refresh: 3; URL=login.php");
}

// close the connection
$conn->close();
?>