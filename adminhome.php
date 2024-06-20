<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin home</title>
	<link rel="stylesheet" href="css/adminhome.css">
 	<link rel="stylesheet" href="css/userhome.css">

</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username_admin'])) {
    // Redirect the user to the login page
    header("Location: home.php?loginPrompt=true");
    exit;
}
?>

	<?php
	include("header.php");
	?>
    <div class="butons">
           
          <div><a id="createPackageBtn" class="adminnav" href="createPackage.php">Create Package</a></div>
           <div> <a id="viewPackagesBtn" class="adminnav"  href="viewPackages.php">View Packages</a></div>
           <div><a id="viewBookingsBtn" class="adminnav"  href="viewBookings.php">View Bookings</a></div> 
         <div> <a id="manageUsersBtn" class="adminnav"  href="manageUsers.php">View Users</a></div>  

        </div>
		 
	<script src="js/script.js"></script>
	</body>
	</html>
	 