<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view packages</title>
    <link rel="stylesheet" href="css/admintable.css">
    <script>
        function confirmDelete(form) {
            if (confirm("Are you sure you want to delete this package?")) {
                form.submit();
            }
        }
    </script>
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
            <th>id</th>
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
                echo "<td>" . $row["package_id"] . "</td>";
                echo "<td>" . $row["package_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . '$' . $row["price"] . "</td>";
                echo "<td>" . $row["duration"] . "</td>";
                echo "<td>" . $row["image_path"] . "</td>";
                    echo "<td>
                 <form method='post' action='delete_package.php' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
                  <input type='hidden' name='id' value='" . $row["package_id"] . "'>
                  <input type='submit' value='Delete'>
              </form>
              </td>";
            echo "<td> <form method='post' action='updatepackages.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["package_id"] . "'>
                        <input type='submit' value='Update'>
                    </form></td>";
    
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