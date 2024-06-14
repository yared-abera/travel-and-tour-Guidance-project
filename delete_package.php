<?php
require_once "dbconnect.php";

if(isset($_GET['package_name'])){
   $package_name = $_GET['package_name'];
   $sql = "DELETE FROM packages WHERE package_name = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $package_name);

   if ($stmt->execute()) {
       echo "Package deleted successfully.";
       header('location:viewPackage.php');
   } else {
       echo "Error deleting package: " . $stmt->error;
   }

   $stmt->close();
}
?>