<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    //  unset($_SESSION['admin-home']);
    //  session_destroy();
// Check if the user is logged in
if (isset($_SESSION['username'])) { 
    header("Location: userhome.php");
}
  
   include("above_header.php"); 
   include("header.php");

}
 
// Check if login prompt should be displayed
$showLoginPrompt = isset($_GET['loginPrompt']) && $_GET['loginPrompt'] === 'true';

  include("mainhome.php");
?>

