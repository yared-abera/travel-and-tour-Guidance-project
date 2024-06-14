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
    $sql = "SELECT * FROM bookings";
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
<table>
    <tr>
        <th>Customer Name</th>
        <th>Contact Details</th>
        <th>Selected Package</th>
        <th>Booking Status</th>
    </tr>
    <?php
    // include("adminhome.php");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "<td>" . $row["contact_details"] . "</td>";
            echo "<td>" . $row["selected_package"] . "</td>";
            echo "<td>" . $row["booking_status"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No bookings found</td></tr>";
    }
    ?>
</table>