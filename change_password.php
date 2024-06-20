<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page

    header("Location: home.php?loginPrompt=true");

    exit;
}
require_once "dbconnect.php";

// Fetch the user data
$user_name = $_SESSION['username'];
$stmt = $conn->prepare("SELECT name, username, email, user_id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $user_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
// Handle form submission for password update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Verify current password
    if (!empty($current_password) && !password_verify($current_password, $row['password'])) {
        $message = "<span style='color:red;'>Current password is incorrect.</span>";
    } elseif ($new_password !== $confirm_password) {
        $message = "<span style='color:red;'>New password and confirm password do not match.</span>";
    } else {
        // Update the password
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $updateStmt->bind_param("si", $new_hashed_password, $row['user_id']);
        if ($updateStmt->execute()) {
            $message = "<span style='color:green;'>Password changed successfully.</span>";
        } else {
            $message = "<span style='color:red;'>Error changing password: " . $conn->error . "</span>";
        }
        $updateStmt->close();
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="css/userprofile.css">
</head>

<body>
    
    <div class="profile-container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h2>Change Password</h2>
            <label for="current_password">Current Password:</label>
            <div><input type="password" id="current_password" name="current_password"></div>
            <label for="new_password">New Password:</label>
            <div><input type="password" id="new_password" name="new_password" required></div>
            <label for="confirm_password">Confirm Password:</label>
            <div><input type="password" id="confirm_password" name="confirm_password" required></div>
            <input type="submit" value="Update Password">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <a href="userhome.php" class="back-button">Back</a>
        </form>
    </div>
</body>

</html>