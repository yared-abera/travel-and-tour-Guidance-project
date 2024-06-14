<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admintable.css">
</head>
<body>
    

<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $packageName = $_POST["package_name"];
   $description = $_POST["description"];
   $price = $_POST["price"];
   $duration = $_POST["duration"];
   
   // Image upload
   $targetDir = "images/";
   $fileName = basename($_FILES["image"]["name"]);
   $targetPath = $targetDir . $fileName;
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
   
   // Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["image"]["tmp_name"]);
   if ($check !== false) {
      $uploadOk = 1;
   } else {
      echo "Error: File is not an image.";
      $uploadOk = 0;
   }
   
   // Check if file already exists
   if (file_exists($targetPath)) {
      echo "Error: File already exists.";
      $uploadOk = 0;
   }
   
   // Check file size
   if ($_FILES["image"]["size"] > 500000) {
      echo "Error: File is too large.";
      $uploadOk = 0;
   }
   
   // Allow only certain file formats
   $allowedFormats = array("jpg", "jpeg", "png", "gif");
   if (!in_array($imageFileType, $allowedFormats)) {
      echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
      $uploadOk = 0;
   }
   
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
      echo "Error: Image upload failed.";
   } else {
      // If everything is okay, try to upload the image
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
         // Insert package details into the database
         $sql = "INSERT INTO packages (package_name, description, price, duration, image_path) VALUES ('$packageName', '$description', '$price', '$duration', '$targetPath')";
         
         if ($conn->query($sql) === true) {
            echo "Package created successfully";
         } else {
            echo "Error creating package: " . $conn->error;
         }
      } else {
         echo "Error: Image upload failed.";
      }
   }
}
?>
                      
<!-- HTML form to create a package -->
<div class="createform">
   <h1>CREATE PACKAGES</h1>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      <label for="package_name">Package Name:</label>
      <input type="text" name="package_name" required placeholder="Enter package name">
      
      <label for="description">Description:</label>
      <textarea name="description" required placeholder="Insert description"></textarea>
      
      <label for="price">Price:</label>
      <input type="number" name="price" required placeholder="Insert price in dollars">
      
      <label for="duration">Duration:</label>
      <input type="text" name="duration" required>
      
      <label for="image">Image:</label>
      <input type="file" name="image" required accept="image/*">
      
      <input type="submit" value="CREATE" class="submit">
   </form>
</div>
</body>
</html>