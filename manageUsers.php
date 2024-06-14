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
require_once "dbconnect.php";

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
<div class="table-div">

        <div class="back">
            <button id="backButton">Back</button>
        </div>
        <!-- table content -->
    </div>

    <script>
        // Add an event listener to the back button
        document.getElementById('backButton').addEventListener('click', navigateToAdminHome);

        function navigateToAdminHome() {
            // Redirect to the adminhome.php page
            window.location.href = 'adminhome.php';
        }
    </script>
<!-- Display users in a table -->
<table>
    <tr>
        <th>Username</th>
        <!-- Add other user fields as required -->
    </tr>
    <?php
    include("adminhome.php");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            // Display other user fields here
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='1'>No users found</td></tr>";
    }
    ?>
</table>
</body>
</html>