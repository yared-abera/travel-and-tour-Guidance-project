<?php

// Initialize the session
session_start();
 unset($_SESSION['admin-home ']);
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: home.php");
exit;
?>