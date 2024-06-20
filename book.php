<?php
// Start the session
session_start();
require("dbconnect.php");
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    
    header("Location: home.php?loginPrompt=true");
    
    exit;
}

// Check if the package_id is set in the URL
if (isset($_GET['package_id'])) {
    $package_id = mysqli_real_escape_string($conn, $_GET['package_id']);
} else {
    // Redirect the user to the package list page or display an error message
    header('location:book.php');
    exit;
}

// Retrieve the package details from the database
$sql = "SELECT * FROM packages WHERE package_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $package_id);
$stmt->execute();
$result = $stmt->get_result();

// Retrieve the user details from the database
$user_name = $_SESSION['username'];
$user_sql = "SELECT * FROM users WHERE username = ?";
$user_stmt = $conn->prepare($user_sql);
$user_stmt->bind_param("s", $user_name);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$row = $user_result->fetch_assoc();

if ($result->num_rows > 0) {
    $package = $result->fetch_assoc();
} else {
    // Redirect the user to the package list page or display an error message
    header('location:packages.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Package</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
    .section {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .form{
            display: flex;
            justify-content:space-between;
            align-items: center;
    }
        form {
            width: 50%;
            background-color: #fff;
            padding: 30px;
            
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
           justify-content: center;
           align-items: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            flex-direction: column;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message, .error-message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 3px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }
        .back-button {
    display: block;
    width: 15%;
    padding: 10px;
    background-color: #f44336;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 10px;
    /* Added margin-top */
}

.back-button:hover {
    background-color: #c62828;
}
    </style>
</head>
<body>
    <h1>Book Package: <?php echo $package['package_name']; ?></h1>

    <?php
    // Display any success or error messages
    if (isset($_SESSION['success_message'])) {
        echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';
        unset($_SESSION['success_message']);
    } elseif (isset($_SESSION['error_message'])) {
        echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>
    <section class="section">

    <form method="post" action="book_process.php">
        <input type="hidden" name="package_id" value="<?php echo $package['package_id']; ?>">
       
        <div class="form">
        <div class="section1">

        <label for="name">Username:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['username']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        </div>

        <div class="section2">
        <label for="guests">Number of Guests:</label>
        <input type="number" id="guests" name="guests" min="1" required>
         
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="arrivals">Arrival Date:</label>
        <input type="date" id="arrivals" name="arrivals" required>

        <label for="leaving">Departure Date:</label>
        <input type="date" id="leaving" name="leaving" required>
        
        </div>
        </div>
        <button type="submit" name="send">Book Now</button>
        <a href="userhome.php" class="back-button">Back</a>
    </form>
    </section>
</body>
</html>