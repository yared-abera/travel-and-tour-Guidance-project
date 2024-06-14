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
include("adminhome.php");
require_once "dbconnect.php";
;$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!-- Display packages in a table -->
 <div class="table-div">
<table border="4" class="table" border-collapse="collapse">
    <tr>
        <th>Package Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Duration</th>
        <th>image_path</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["package_name"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "<td>" .'$'.$row["price"] . "</td>";
            echo "<td>" . $row["duration"] . "</td>";
            echo "<td>" . $row["image_path"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No packages found</td></tr>";
    } 
    ?>
    </table>
 </div>
</body>
</html>