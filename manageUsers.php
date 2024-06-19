<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage users</title>
    <link rel="stylesheet" href="css/admintable.css">
</head>

<body>

    <?php
    require_once "dbconnect.php";

    $sql = "SELECT * FROM users";
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
    <div>
        <table border="4" class="table" border-collapse="collapse">
            <tr>
                <th>user_id</th>
                <th>name</th>
                <th>Username</th>
                <th>email</th>
                
                <!-- Add other user fields as required -->
            </tr>
            <?php
            // include("adminhome.php");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    

                    // Display other user fields here
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>