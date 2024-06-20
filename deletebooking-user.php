<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php?loginPrompt=true");
    exit;
}

require("dbconnect.php");

if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // Prepare and execute DELETE query
    $stmt = $conn->prepare("DELETE FROM bookings WHERE booking_id = ?");
    $stmt->bind_param("s", $booking_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Booking canceled successfully.";
    } else {
        $_SESSION['error_message'] = "Error canceling booking. Please try again.";
    }
}

header("Location: user-booking-his.php"); // Redirect back to the bookings list page
exit;
?>
