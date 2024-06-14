<?php
require_once "dbconnect.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

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
            echo "<td>" . $row["username"] . "</td>";
            // Display other user fields here
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='1'>No users found</td></tr>";
    }
    ?>
</table>