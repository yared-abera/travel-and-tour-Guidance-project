<?php
require "dbconnect.php";
$id = $_POST['id'];

$sql = "DELETE FROM packages WHERE package_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    // Check if the error is due to a foreign key constraint
    if (strpos($conn->error, 'foreign key constraint') !== false) {
        echo "Error deleting record: The package is referenced by one or more bookings and cannot be deleted.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>