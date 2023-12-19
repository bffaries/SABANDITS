<?php
session_start(); // Start a session if not already started

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing login logic here
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform authentication, replace this with your actual authentication logic
    $is_authenticated = authenticate($username, $password);

    if ($is_authenticated) {
        // Store user information in session if needed
        $_SESSION['username'] = $username;

        // Redirect to the homepage on successful login
        header("Location: user/");
        exit();
    } else {
        // Handle unsuccessful login, you may want to set an error message
        echo "Invalid username or password. Please try again.";
    } 
}

// Function to authenticate user, replace this with your actual authentication logic
function authenticate($username, $password) {
    // Your database connection details
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "rb";

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input to prevent SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query the database to check if the username and password match
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    // Close the database connection
    $conn->close();

    // Return true if a matching user is found, false otherwise
    return ($result->num_rows > 0);
}
?>

