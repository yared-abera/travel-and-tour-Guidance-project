<?php
$con = require "dbconnect.php";

if ($con) {
    if (isset($_POST['id']))  {
        $id = $_POST['id'];
        $package_name = $_POST['package_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        $current_image_path = $_POST['current_image_path'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "images/";
            $image_name = basename($_FILES["image"]["name"]);
            $image_path = $target_dir . $image_name;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
                $sql = "UPDATE packages SET 
                            package_name='$package_name', 
                            description='$description', 
                            price='$price', 
                            duration='$duration',
                            image_path='$image_path' 
                        WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    $message = "Record updated successfully";
                } else {
                    $message = "Error updating record: " . $conn->error;
                }
            } else {
                $message = "Error uploading the file.";
            }
        } else {
            $sql = "UPDATE packages SET 
                            package_name='$package_name', 
                            description='$description', 
                            price='$price', 
                            duration='$duration',
                            image_path='$current_image_path' 
                        WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                $message = "Record updated successfully";
            } else {
                $message = "Error updating record: " . $conn->error;
            }
        }
    } else {
        $message = "Invalid request. package_id is missing.";
    }

    $conn->close();
} else {
    $message = "Error connecting to the database.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <link rel="stylesheet" href="update.css"> 
</head>
<body>
    <div class="container">
        <h2>Update Status</h2>
        <p><?php echo $message; ?></p>
        <a href="viewPackages.php" class="button">Back to packages</a>
    </div>
</body>
</html>