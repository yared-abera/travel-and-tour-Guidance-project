<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admintable.css">
</head>
<body>
    
<?php
 include("header.php");
require_once "dbconnect.php";

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!-- Display bookings in a table -->
 <div class="table-div">
<table border="4" class="table" border-collapse="collapse">
    <tr>
       <th>Booking ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Location</th>
        <th>Guests</th>
        <th>Arrivals</th>
        <th>Leaving</th>
        <th>Booking Status</th>
        
    </tr>
    <?php
   
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . $row["booking_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td>" . $row["guests"] . "</td>";
            echo "<td>" . $row["arrivals"] . "</td>";
            echo "<td>" . $row["leaving"] . "</td>";
            echo "<td>" . $row["booking_status"] . "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No bookings found</td></tr>";
    }
    ?>
</table>
</div>
</body>
</html>