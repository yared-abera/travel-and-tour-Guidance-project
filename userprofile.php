<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/userprofile.css">
</head>

<body>
 <?php
    session_start();
    require_once "dbconnect.php";
  // Fetch the user data
    $user_name = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT name, username, email,user_id FROM users WHERE username = ?");
    $stmt->bind_param("i", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); 
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $user_id=$row['user_id'];
        // Update the user's profile in the database
    
        $updateStmt = $conn->prepare("UPDATE users SET name = ?, username = ?, email = ? WHERE username=?");
        $updateStmt->bind_param("sssi", $name, $username, $email,$user_id);
        if ($updateStmt->execute()) {
           echo "Profile updated successfully!";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
        $updateStmt->close();
    }
    ?>
    
  <div class="profile-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            
            <label for="name">Name:</label>
            <div><input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required></div>
            <label for="username">Username:</label>
            <div><input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required></div>
          
            <label for="email">Email:</label>
            <div><input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required></div>
      
            <input type="submit" value="Update Profile">
            <a href="userhome.php" class="back-button">Back</a> 
  </form>
  </div>
    <?php
    // Close the database connection
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>