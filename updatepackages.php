<?php
require_once "dbconnect.php";

// Check if the form was submitted
if (isset($_POST['id'])) {
    $id = $_POST['id']; // Get the package_id from the form submission

    // Fetch existing data to populate the update form
    $sql = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form with existing data
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update package</title>
    <link rel='stylesheet' href='admintable.css'>
</head>
<body>

<form method='post' action='process update.php' enctype='multipart/form-data' class='createform'>
    <input type='hidden' name='id' value='" . $row["id"] . "'>
    <label for='package_name'>Package Name:</label><br>
    <input type='text' id='package_name' name='package_name' value='" . $row["package_name"] . "'><br>
    
    <label for='description'>description:</label><br>
    <input type='text' id='description' name='description' value='" . $row["description"] . "'><br>
    
    <label for='price'>Price:</label><br>
    <input type='text' id='price' name='price' value='" . $row["price"] . "'><br>

     <label for='duration'>Duration:</label><br>
    <input type='text' id='duration' name='duration' value='" . $row["duration"] . "'><br>
    
    <label for='current_image_path'>Current Image Path:</label><br>
    <input type='text' id='current_image_path' name='current_image_path' value='" . $row["image_path"] . "' readonly><br>
    
    <label for='image'>New Image:</label><br>
    <input type='file' id='image' name='image'><br>
    
    <input type='submit' value='Update'>
</form>

</body>
</html>";
    } else {
        echo "Record not found";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request. package_id is missing.";
}
?>