<?php
require("dbconnect.php");

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $package_id = mysqli_real_escape_string($conn, $_POST["package_id"]);

    // Check if the package_id exists in the packages table
    $sql = "SELECT * FROM packages WHERE package_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $package_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $contact_detail = $email . " " . $phone . " " . $address;

        $sql = "INSERT INTO bookings (customer_name, contact_details, location, guests, arrivals, leaving, package_id) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $contact_detail, $location, $guests, $arrivals, $leaving, $package_id);

        if ($stmt->execute()) {
            session_start();
            $_SESSION['success_message'] = "Booking successful.";
            header('location:book.php');
        } else {
            $error = $stmt->error;
            echo "Something went wrong: $error";
        }
    } else {
        // Redirect the user back to the booking form with an error message
        session_start();
        $_SESSION['error_message'] = "Invalid package selected. Please try again.";
        header('location:book.php');
    }

    $stmt->close();
} else {
    echo 'Something went wrong, please try again!';
}

$conn->close();
?>