<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userhome.css">
</head>

<body>



    <?php
    session_start();
    require_once "dbconnect.php";


    // Establish the database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the user data
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT name, username, email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Update the user's profile in the database
        $updateStmt = $conn->prepare("UPDATE users SET name = ?, username = ?, email = ? WHERE user_id = ?");
        $updateStmt->bind_param("sssi", $name, $username, $email, $user_id);
        if ($updateStmt->execute()) {
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
        $updateStmt->close();
    }
    ?>
    

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <input type="submit" value="Update Profile">
        </form>
  
    <?php
    // Close the database connection
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>