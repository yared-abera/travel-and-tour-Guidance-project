<?php
require("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST["booking_id"];

    // Update the booking status in the database
    $sql = "UPDATE bookings SET booking_status = 'Confirmed' WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $sql)) {
        echo "Booking confirmed successfully.";
    } else {
        echo "Error confirming the booking: " . mysqli_error($conn);
    }
}

// Redirect back to the view bookings page
header("Location: viewBookings.php");
exit();
?>