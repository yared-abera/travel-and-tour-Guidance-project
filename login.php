<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('dbconnect.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check if fields are not empty
    if (empty($username) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
         
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
             
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username']= $_POST['username'];
                header("Location: userhome.php"); // Redirect to a dashboard or home page
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that username.";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>

    <link rel="stylesheet" href="css/login.css">
</head>
<body>
     <!--login section starts -->
<div id="loginModal" class="modal">
        <div class="modal-content" >
            <span id="closeBtn">&times;</span>
            <h2>Login</h2>
            <form   action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" name="signin" value="SIGNIN">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
    <!-- login section ends -->
</body>
</html>