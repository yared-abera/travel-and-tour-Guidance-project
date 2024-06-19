<?php
require("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST["booking_id"];

    // Update the booking status in the database
    $sql = "UPDATE bookings SET booking_status = 'Cancelled' WHERE booking_id = $booking_id";
    if (mysqli_query($conn, $sql)) {
        echo "Booking cancelled successfully.";
    } else {
        echo "Error cancelling the booking: " . mysqli_error($conn);
    }
}
 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
 
// Check if the user is logged in
if (isset($_SESSION['username'])) { 
    header("Location: userhome.php");
}}
else{
// Redirect back to the view bookings page
header("Location: viewBookings.php");
}
exit();
?>