<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user home</title>
    <link rel="stylesheet" href="css/userhome.css">
</head>

<body>
    <section class="header">
        <div class="home">
            <div class="div">
                <a href="userprofile.php">Profile</a>
                <a href="change_password.php">Change Password</a>
                <a href="user-booking-his.php">History</a>
            </div>
            <a href="logout.php">Logout</a>

        </div>
    </section>
    <?php
    session_start();
    echo $_SESSION['username'];
    // Include the file
    include ("header.php");
    include ("package.php");

    ?>
</body>

</html>