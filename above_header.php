<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/package.css"> 
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>

</head>
<body>

<?php
 include("login.php");
 include("register.php"); 

?>
 
<section class="header">
<nav class="navbar">
    <div class="userheader">
    <h6><a href="adminlogin.php">admin</a> </h6>
    <a id="loginBtn" href="#" style="font-size:12px">login/</a>
    <a id="signupBtn" href="#">signup</a>
</div>
 </nav>
 </section>
 <!-- <script src="js/script.js"></script> -->
</body>
</html>
