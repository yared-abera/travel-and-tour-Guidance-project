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
    require("dbconnect.php");
    $sql = "SELECT 
    b.booking_id,
    b.customer_name,
    b.contact_details,
    p.package_name AS selected_package,
    b.booking_status,
    b.package_id
FROM 
    bookings b
JOIN
    packages p ON b.package_id = p.package_id";
   
    // $sql = "SELECT * FROM bookings";
//     $sql="SELECT 
//     b.customer_name,
//     b.contact_details,
//     p.package_name AS selected_package,
//     b.booking_status
// FROM 
//     bookings b
// JOIN
//     packages p ON b.package_id = p.package_id";

    $result =mysqli_query($conn,$sql);
    ?>
    
    <div class="table-div">
        <div class="back">
        <button id="backButton">Back</button>
        </div>
      
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

            echo "<td>
    <form method='post' action='cancelbooking.php' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
        <input type='hidden' name='booking_id' value='" . $row["booking_id"] . "'>
        <input type='submit' value='Cancel'>
    </form>
    <form method='post' action='confirmBooking.php' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
        <input type='hidden' name='booking_id' value='" . $row["booking_id"] . "'>
        <input type='submit' value='Confirm'>
    </form>
</td>";
            echo "</tr>";         
        }
    } else {
        echo "<tr><td colspan='4'>No bookings found</td></tr>";
    }
    ?>

<script>
    function confirmDelete(form) {
        if (confirm("Are you sure you want to perform this action?")) {
            form.submit();
        }
    }
</script>
</table>