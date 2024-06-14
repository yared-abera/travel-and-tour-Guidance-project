<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
require_once "dbconnect.php";

// Fetch package details from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);

// Check if packages are available
if ($result->num_rows > 0) {
    include("header.php");
    echo '<div class="heading" style="background:url(images/package-bg.jpg) no-repeat">
            <h1>packages</h1>
          </div>';
    echo '<section class="packages">
            <h1 class="heading-title">top destinations</h1>
            <div class="box-container">';

    while ($row = $result->fetch_assoc()) {
        $packageName = $row["package_name"];
        $description = $row["description"];
        $price = $row["price"];
        $imagePath = $row["image_path"];

        echo '<div class="box">
                <div class="image">
                  <img src="' . $imagePath . '" alt="">
                </div>
                <div class="content">
                  <h3>' . $packageName . '</h3>
                  <p>' . $description . '</p>
                  <h2>$' . $price . '</h2>
                  <a href="book.php" class="btn">book now</a>
                </div>
              </div>';
    }

    echo '</div></section>';
    include("footer.php");
} else {
    echo "<p>No packages available.</p>";
}
?>
<script src="js/script.js"></script>
</body>
</html>