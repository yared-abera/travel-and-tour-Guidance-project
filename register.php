<?php
require "dbconnect.php";
if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $sql= "SELECT * FROM users WHERE email = '$email'";
    $check_email = mysqli_query($conn, $sql);
    if(mysqli_num_rows($check_email) > 0) {
        $message[] = 'Email already exists!';
    } else {
        $check_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if(mysqli_num_rows($check_username) > 0) {
            $message[] = 'Username already exists!';
        } else {
            if($pass != $cpass) {
                $message[] = 'Confirm password does not match!';
            } elseif(strlen($pass) < 6) {
                $message[] = 'Password must be at least 6 characters!';
            } else {
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
                mysqli_query($conn, "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$hashed_pass')") or die('Query failed: ' . mysqli_error($conn));
                $message[] = 'Registered successfully!';
                header('Location: login.php');
                exit(); // Ensure no further code is executed after the redirect
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <script>
        <?php
        if(isset($message)){
            foreach($message as $msg){
                echo "alert('$msg');";
            }
        }
        ?>
    </script>
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <form action="" name="signup-form" method="post" onsubmit="return validateForm()">
                <span id="closeBtn-register">&times;</span>
                <h3>register now</h3>
                <div><input type="text" id="name" name="name" class="box" placeholder="Enter your full name" required></div>
                <div><input type="text" id="username" name="username" class="box" placeholder="Enter your username" required></div>
                
                <div><input type="email" id="email" name="email" placeholder="Enter your email" class="box" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></div>
                <div><input type="password" id="password" name="password" class="box" placeholder="Enter a password" required></div>
                <div><input type="password" id="confirm-password" name="cpassword" class="box" placeholder="Confirm your password" required></div>
                <div><input type="submit" name="submit" value="register now" class="btn"></div>
                <p>already have an account? <a href="login.php">login now</a></p>
            </form>
        </div>
    </div>
</body>
</html>
