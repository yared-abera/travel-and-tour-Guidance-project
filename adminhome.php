<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/adminhome.css">
</head>
<body>
	<?php
	include("header.php");
	?>
    <div class="butons">
           
        <button>  <a id="createPackageBtn" class="adminnav" href="createPackage.php">Create Package</button>
         <button> <a  id="viewPackagesBtn" class="adminnav"  href="viewPackages.php">View Packages</button>
         <button> <a id="viewBookingsBtn" class="adminnav"  href="viewBookings.php">View Bookings</button>
        <button>  <a id="manageUsersBtn" class="adminnav"  href="manageUsers.php">Manage Users  </button>

        </div>
	<script src="js/script.js"></script>
	</body>
	</html>