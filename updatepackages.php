<?php
require_once "dbconnect.php";

// Check if the package ID is provided in the URL
if (isset($_GET['update'])) {
    $updateId = $_GET['update'];

    // Fetch the existing package information from the database
    $selectQuery = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $updateId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the updated form data
        $updatedPackageName = $_POST['package_name'];
        $updatedDescription = $_POST['description'];
        $updatedPrice = $_POST['price'];
        $updatedDuration = $_POST['duration'];
        $updatedImagePath = $_POST['image_path'];

        // Update the package in the database
        $updateQuery = "UPDATE packages SET package_name = ?, description = ?, price = ?, duration = ?, image_path = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssdssi", $updatedPackageName, $updatedDescription, $updatedPrice, $updatedDuration, $updatedImagePath, $updateId);

        if ($stmt->execute()) {
            
            header("Location: viewPackages.php");
            exit;
        } else {
            echo "Error updating package: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    
    header("Location: adminhome.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>
    <link rel="stylesheet" href="css/admintable.css">
</head>
<body>
    <h1>Update Package</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?update=" . $updateId; ?>">
        <label for="package_name">Package Name:</label>
        <input type="text" id="package_name" name="package_name" value="<?php echo $row['package_name']; ?>"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>"><br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="<?php echo $row['duration']; ?>"><br>

        <label for="image_path">Image Path:</label>
        <input type="text" id="image_path" name="image_path" value="<?php echo $row['image_path']; ?>"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>