<?php
require"dbconnect.php";
$id = $_POST['id'];

$sql = "DELETE FROM packages WHERE package_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
