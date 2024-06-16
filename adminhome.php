<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin home</title>
	<link rel="stylesheet" href="css/adminhome.css">

</head>
<body>
	<?php
	include("header.php");
	?>
    <div class="butons">
           
          <div><a id="createPackageBtn" class="adminnav" href="createPackage.php">Create Package</a></div>
           <div> <a id="viewPackagesBtn" class="adminnav"  href="viewPackages.php">View Packages</a></div>
           <div><a id="viewBookingsBtn" class="adminnav"  href="viewBookings.php">View Bookings</a></div> 
         <div> <a id="manageUsersBtn" class="adminnav"  href="manageUsers.php">Manage Users</a></div>  

        </div>
	<script src="js/script.js"></script>
	</body>
	</html>