<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking history</title>
    <link rel="stylesheet" href="css/admintable.css"> <!-- Assuming you have a CSS file for styling -->
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: home.php?loginPrompt=true");
        exit;
    }
    // Display success or error messages as alerts
if (isset($_SESSION['success_message'])) {
    echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['error_message'])) {
    echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
    unset($_SESSION['error_message']);
}
    require("dbconnect.php");
    
    $name = $_SESSION['username'];
    
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE customer_name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="table-div">
        <div class="back">
            <button id="backButton">Back</button>
        </div>
    </div>

    <table border="1" class="table" border-collapse="collapse">
        <tr>
            <th>Booking ID</th>
            <th>Contact Details</th>
            <th>Selected Package</th>
            <th>Guests</th>
            <th>Arrival Date</th>
            <th>Departure Date</th>
            <th>Booking Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Fetch additional details like package name using a separate query
                $package_id = $row["package_id"];
                $sql = $conn->prepare("SELECT package_name FROM packages WHERE package_id = ?");
                $sql->bind_param("s", $package_id);
                $sql->execute();
                $p_result = $sql->get_result();
                $p_row = $p_result->fetch_assoc();

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["booking_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["contact_details"]) . "</td>";
                echo "<td>" . htmlspecialchars($p_row["package_name"])  . "</td>";
                echo "<td>" . htmlspecialchars($row["guests"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["arrivals"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["leaving"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["booking_status"]) . "</td>";
                echo "<td>
                        <form method='post' action='deletebooking-user.php' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='booking_id' value='" . htmlspecialchars($row["booking_id"]) . "'>
                            <input type='submit' value='Cancel'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No bookings found</td></tr>";
        }
        ?>
    </table>

    <script>
        document.getElementById('backButton').addEventListener('click', navigateToUserHome);

        function navigateToUserHome() {
            window.location.href = 'userhome.php';
        }

        function confirmDelete() {
            return confirm("Are you sure you want to cancel this booking?");
        }
    </script>

</body>

</html>
