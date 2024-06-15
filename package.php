<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="css/package.css">
  <link rel="stylesheet" href="css/style.css">
  <title>packages page</title>
  <script>
       $(document).ready(function(){
           $(".scroll-top").click(function() {
               $("html, body").animate({ 
                  scrollTop: 0 
             }, "slow");
               return false;
        });
       });
   </script>
</head>
<body>

<?php
require_once "dbconnect.php";
include("header.php");
// Fetch package details from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
echo '<div class="heading" style="background:url(images/package-bg.jpg) no-repeat">
<h1>packages</h1>
</div>';
echo '<section class="packages">
<h1 class="heading-title">top destinations</h1>
<div class="box-container">';
// Check if packages are available
if ($result->num_rows > 0) {
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
    echo '</div>
      <div class="load-more"><span class="btn">see more</span></div>
     </section>'; 
    include("footer.php");
} else {
    echo "<p>No packages available.</p>";
}
?>
 <button type="button" class="scroll-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
<script src="js/script.js"></script>
</body>
</html>