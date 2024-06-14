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
    // include("adminhome.php");
    require_once "dbconnect.php";
    ;
    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);
    ?>

    <!-- Display packages in a table -->
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
                echo "<td>" . '$' . $row["price"] . "</td>";
                echo "<td>" . $row["duration"] . "</td>";
                echo "<td>" . $row["image_path"] . "</td>";
                echo "<td><a href='delete_package.php?package_name=" . $row["package_name"] . "' class='btn btn-danger btn-sm delete-btn'>Delete</a></td>";
            echo "<td><a href='update_package.php?package_name=" . $row["package_name"]. "' class='btn btn-primary btn-sm update-btn'>Update</a></td>";
            echo "</tr>";
        }
            }
         else {
            echo "<tr><td colspan='4'>No packages found</td></tr>";
        }
        ?>

    </table>

    </div>

</body>

</html>